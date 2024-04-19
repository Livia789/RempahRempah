<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
use App\Models\AvoidedIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct(){
        View::share('category_all', Category::all());
        View::share('tag_all', Tag::all());
        View::share('unique_ctg_groups', Category::all()->unique('class'));
        View::share('duration_minutes', [15, 30, 45, 60]);

        View::share('functions', [
            'buildFilterQuery' => function ($name, $categoryGroups, $index, $curr_ctg_id, $durations, $duration_new, $tags, $tag_new) {
                $query_str = "";
                if (isset($name) && $name != null) {
                    $query_str .= "name=".$name."&";
                }
                for ($i = 0; $i <= 2; $i++) {
                    if (isset($categoryGroups[$i])) {
                        if (isset($index) && $i == $index) {
                            if (!in_array($curr_ctg_id, $categoryGroups[$i])) {
                                $categoryGroups[$i][] = (string) $curr_ctg_id;
                            } else {
                                $pos = array_search($curr_ctg_id, $categoryGroups[$i]);
                                unset($categoryGroups[$i][$pos]);
                            }
                        }
                        if (count($categoryGroups[$i]) > 0) {
                            $query_str .= "category".$i."=".implode('%', $categoryGroups[$i]).'&';
                        }
                    } elseif (isset($index) && $i == $index) {
                        $query_str .= "category".$i."=".$curr_ctg_id.'&';
                    }
                }
                if (isset($durations)) {
                    if (isset($duration_new)) {
                        if (!in_array($duration_new, $durations)) {
                            $durations[] = (string) $duration_new;
                        } else {
                            $pos = array_search($duration_new, $durations);
                            unset($durations[$pos]);
                        }
                    }
                    if (count($durations) > 0) {
                        $query_str .= "duration=".implode('%', $durations).'&';
                    }
                } elseif (isset($duration_new)) {
                    $query_str .= "duration=".$duration_new.'&';
                }
                if (isset($tags)) {
                    if (isset($tag_new)) {
                        if (!in_array($tag_new, $tags)) {
                            $tags[] = (string) $tag_new;
                        } else {
                            $pos = array_search($tag_new, $tags);
                            unset($tags[$pos]);
                        }
                    }
                    if (count($tags) > 0) {
                        $query_str .= "tag=".implode('%', $tags).'&';
                    }
                } elseif (isset($tag_new)) {
                    $query_str .= "tag=".$tag_new.'&';
                }
                return str_replace('%', '%25', $query_str);
            }
        ]);
    }

    public function showHomePage() {
        return view('home');
    }

    public function showLoginPage() {
        return view('login');
    }

    public function showRegisterPage() {
        return view('register');
    }

    public function showWelcomePage() {
        $user = Auth::user();
        $currentTime = Carbon::now();
        $timeGap = $currentTime->diffInHours(Carbon::parse($user->created_at));
        $userNotNew = AvoidedIngredient::where('user_id', $user->id)->first();
        if ($timeGap <= 3 && $userNotNew == null) {
            $selected_ingredients = [];
            return view('welcome')->with('user', $user)
                                  ->with('selected_ingredients', $selected_ingredients);
        }
        return redirect('/')->with('accessDenied', 'Akses ditolak.');
    }

    public function updatePrefPage(Request $req) {
        $user = Auth::user();
        $cmd = $req->input('cmd');
        if ($cmd != null) {
            $selected_ingredients = collect($req->input('selected_ingredients'));
            $curr_ingredient = $req->input('curr_ingredient');
            if ($cmd == 'remove') {
                $selected_ingredients = $selected_ingredients->reject(function ($item) use ($curr_ingredient) {
                    return $item == $curr_ingredient;
                });
            } else if ($selected_ingredients->doesntContain($curr_ingredient)) {
                $selected_ingredients->push($curr_ingredient);
            }

            $avoided_ingredients = $user->avoidedIngredients->pluck('ingredient_name');
            $changes = $selected_ingredients->diff($avoided_ingredients)->isEmpty() ? false : true;
        } else {
            $selected_ingredients = [];
        }
        return back()->with('user', $user)
                        ->with('selected_ingredients', $selected_ingredients)
                        ->with('changes', $changes);
    }

    public function showResetPasswordPage() {
        return view('resetPassword');
    }

    public function showMyPreferencesPage() {
        $user = Auth::user();
        $selected_ingredients = Auth::user()->avoidedIngredients->pluck('ingredient_name');
        return view('myPreferences')->with('user', $user)
                                    ->with('selected_ingredients', $selected_ingredients);
    }

    public function showMyRecipesPage(){
        $user = Auth::user();
        $myRecipes = $user->recipes;
        return view('temp/myRecipes', compact('user', 'myRecipes'));
    }

    public function showMyProfilePage(){
        $user = Auth::user();
        return view('myProfile', compact('user'));
    }

    public function showMyReviewsPage(){
        $user = Auth::user();
        $reviews = $user->reviews;
        return view('myReviews', compact('user', 'reviews'));
    }

    public function showMyBookmarksPage(){
        $user = Auth::user();
        $bookmarks = $user->bookmarks;
        return view('temp/bookmarks', compact('user', 'bookmarks'));
    }

    public function showRecipeDetailPage($recipe_id){
        $user = Auth::user();
        $recipe = Recipe::find($recipe_id);
        if ((isset($user) && $recipe->user_id === $user->id) || $recipe->isPublic()) {
            return view('temp/recipeDetail', compact('recipe'));
        } else {
            echo "You are not authorized to view this recipe. TODO: handle ini pagenya mau gimana";
        }
    }

    public function showSearchPage(Request $req){
        $query = Recipe::query();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $query->where(function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                      ->orWhere(function ($query) {
                            $query->where('type', 'public')
                                  ->whereNotNull('ahli_gizi_id')
                                  ->whereNotNull('admin_id');
                        });
            });
            $avoidedIngredientNames = AvoidedIngredient::where('user_id', $user_id)->pluck('ingredient_name')->toArray();

            $query->whereDoesntHave('ingredientHeaders.ingredients', function ($query) use ($avoidedIngredientNames) {
                $query->whereIn('name', $avoidedIngredientNames);
            });
            // dd($query->toSql(), $query->getBindings());
        } else {
            $query->where('type', 'public')
                   ->whereNotNull('ahli_gizi_id')
                   ->whereNotNull('admin_id');
        }

        $name = $req->input('name');
        if ($name) {
            $query->where(function ($query) use ($name) {
                $query->where('name', 'like', '%'.$name.'%')
                      ->orWhereHas('ingredientHeaders.ingredients', function ($query) use ($name) {
                        $query->where('name', 'like', '%'.$name.'%');
                    });
            });
        }

        $categoryGroups = [];
        foreach ($req->all() as $key => $value) {
            if (str_contains($key, 'category')) {
                $index = (int) substr($key, 8);
                $categoryGroups[$index] = explode('%', $value);
                if ($index == 0) {
                    $query->whereIn('category_id', $categoryGroups[$index]);
                } else {
                    $query->whereIn('sub_category_'.$index.'_id', $categoryGroups[$index]);
                }
            }
        }

        $duration = $req->input('duration');
        $durations = [];
        if ($duration) {
            $durations = explode('%', $duration);
            $query->where(function ($query) use ($durations) {
                foreach ($durations as $dur) {
                    if ($dur < 0) {
                        $query->orWhere('duration', '>', 90);
                    } else {
                        $query->orWhere('duration', '<=', $dur);
                    }
                }
            });
        }

        $tag = $req->input('tag');
        $tags = [];
        if ($tag) {
            $tags = explode('%', $tag);
            $query->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('id', $tags);
            });
        }

        $recipes = $query->paginate(9);
        return view('search', compact('recipes', 'name', 'categoryGroups', 'durations', 'tags'));
    }
}

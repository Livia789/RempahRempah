<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Tag;
use App\Models\AvoidedIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    protected $top_ingredients;

    public function __construct(){
        View::share('category_all', Category::all());
        View::share('tag_all', Tag::all());
        View::share('unique_ctg_groups', Category::all()->unique('class'));
        View::share('duration_minutes', [15, 30, 45, 60]);

        $this->top_ingredients = Cache::remember('top_ingredients', 60*3, function () {
            $recipes = Recipe::with('ingredientHeaders.ingredients')->get();
            $top_ingredients = [];

            foreach ($recipes as $recipe) {
                foreach ($recipe->ingredientHeaders as $header) {
                    foreach ($header->ingredients as $ingredient) {
                        $name = $ingredient->name;
                        if (!isset($top_ingredients[$name])) {
                            $top_ingredients[$name] = 0;
                        }
                        $top_ingredients[$name]++;
                    }
                }
            }
            arsort($top_ingredients);
            $top_ingredients = array_keys(array_slice($top_ingredients, 0, 10, true));
            return $top_ingredients;
        });
        View::share('top_ingredients', $this->top_ingredients);

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

    public function showRegisterPage() {
        return view('register');
    }

    public function showLoginPage() {
        return view('login');
    }

    public function showResetPasswordPage() {
        return view('resetPassword');
    }

    public function showWelcomePage(Request $req) {
        $user = Auth::user();
        if ($user->accountStatus == 'new') {
            $selected_ingredients = $req->session()->get('selected_ingredients', []);
            $default_ingredients = array_diff($this->top_ingredients, $selected_ingredients);

            $req->session()->put('selected_ingredients', $selected_ingredients);
            $req->session()->put('default_ingredients', $default_ingredients);
            return view('welcome')->with('user', $user);
        }
        return redirect('/')->with('accessDenied', 'Akses ditolak.');
    }

    public function updateSelected(Request $req) {
        $cmd = $req->input('cmd');
        $type = $req->input('type').'s';
        $value = $req->input('value');
        $updateStatus = false;
        $updateBtn = false;

        $top = $this->top_ingredients;
        $default = $req->session()->get('default_'.$type, []);
        $selected = $req->session()->get('selected_'.$type, []);
        $saved = $req->session()->get('saved_'.$type, []);

        $idx = array_search($value, $selected);
        $idx_2 = array_search($value, $top);

        if ($cmd == 'add' && $idx === false) {
            $updateStatus = true;
            $selected[] = $value;
            if ($idx_2 !== false) {
                unset($default[$idx_2]);
                $updateBtn = true;
            }
        } else if ($cmd == 'remove') {
            $updateStatus = true;
            unset($selected[$idx]);
            $selected = array_values($selected);
            if ($idx_2 !== false) {
                $default[] = $value;
                sort($default);
                $updateBtn = true;
            }
        }

        $req->session()->put('default_'.$type, $default);
        $req->session()->put('selected_'.$type, $selected);
        sort($selected);
        sort($saved);
        $changes = $selected == $saved ? false : true;
        $req->session()->put('changes', $changes);
        return response()->json(['updateStatus' => $updateStatus, 'updateBtn' => $updateBtn, 'changes' => $changes]);
    }

    public function showResult(Request $req) {
        $query = $req->input('query');
        $type = $req->input('type');

        if ($type == 'ingredient') {
            $results = Ingredient::where('name', 'LIKE', '%'.$query.'%')->get();
        } else if ($type == 'tag') {
            $results = Tag::where('name', 'LIKE', '%'.$query.'%')->get();
        } else {
            $results = Recipe::query();
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                $results->where(function ($query) use ($user_id) {
                    $query->where('user_id', $user_id)
                          ->orWhere(function ($query) {
                                $query->where('type', 'public')
                                      ->whereNotNull('ahli_gizi_id')
                                      ->whereNotNull('admin_id');
                            });
                });
                $avoidedIngredientNames = AvoidedIngredient::where('user_id', $user_id)->pluck('ingredient_name')->toArray();
                $results->whereDoesntHave('ingredientHeaders.ingredients', function ($query) use ($avoidedIngredientNames) {
                    $query->whereIn('name', $avoidedIngredientNames);
                });
            } else {
                $results->where('type', 'public')
                        ->whereNotNull('ahli_gizi_id')
                        ->whereNotNull('admin_id');
            }
            $results = $results->where('name', 'LIKE', '%'.$query.'%')->get();
        }
        return response()->json($results);
    }

    public function showMyPreferencesPage(Request $req) {
        $user = Auth::user();
        $saved_ingredients = Auth::user()->avoidedIngredients->pluck('ingredient_name')->toArray();
        $selected_ingredients = $req->session()->get('selected_ingredients', $saved_ingredients);
        $default_ingredients = array_diff($this->top_ingredients, $selected_ingredients);

        $req->session()->put('saved_ingredients', $saved_ingredients);
        $req->session()->put('selected_ingredients', $selected_ingredients);
        $req->session()->put('default_ingredients', $default_ingredients);
        sort($selected_ingredients);
        sort($saved_ingredients);
        $changes = $selected_ingredients == $saved_ingredients ? false : true;
        $req->session()->put('changes', $changes);
        return view('myPreferences')->with('user', $user);
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

    public function showMyPasswordPage(){
        $user = Auth::user();
        return view('myPassword', compact('user'));
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
        $reviews = $recipe->reviews;
        if ((isset($user) && $recipe->user_id === $user->id) || $recipe->isPublic()) {
            return view('recipeDetail', compact('recipe', 'user', 'reviews'));
        } else {
            echo "You are not authorized to view this recipe. TODO: handle ini pagenya mau gimana";
        }
    }

    public function TEMP_showRecipeDetailPage($recipe_id){
        $user = Auth::user();
        $recipe = Recipe::find($recipe_id);
        if ((isset($user) && $recipe->user_id === $user->id) || $recipe->isPublic()) {
            return view('temp/recipeDetail', compact('recipe'));
        } else {
            echo "You are not authorized to view this recipe. TODO: handle ini pagenya mau gimana";
        }
    }

    public function showSearchPage(Request $req){
        if (Auth::check() && Auth::user()->accountStatus == 'new') {
            return redirect('welcome');
        }

        $results = Recipe::query();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $results->where(function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                      ->orWhere(function ($query) {
                            $query->where('type', 'public')
                                  ->whereNotNull('ahli_gizi_id')
                                  ->whereNotNull('admin_id');
                        });
            });
            $avoidedIngredientNames = AvoidedIngredient::where('user_id', $user_id)->pluck('ingredient_name')->toArray();
            $results->whereDoesntHave('ingredientHeaders.ingredients', function ($query) use ($avoidedIngredientNames) {
                $query->whereIn('name', $avoidedIngredientNames);
            });
            // dd($query->toSql(), $query->getBindings());
        } else {
            $results->where('type', 'public')
                    ->whereNotNull('ahli_gizi_id')
                    ->whereNotNull('admin_id');
        }

        $name = $req->input('name');
        if ($name) {
            $results->where(function ($query) use ($name) {
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
                    $results->whereIn('category_id', $categoryGroups[$index]);
                } else {
                    $results->whereIn('sub_category_'.$index.'_id', $categoryGroups[$index]);
                }
            }
        }

        $duration = $req->input('duration');
        $durations = [];
        if ($duration) {
            $durations = explode('%', $duration);
            $results->where(function ($query) use ($durations) {
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
            $results->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('id', $tags);
            });
        }

        $recipes = $results->paginate(15);
        return view('search', compact('recipes', 'name', 'categoryGroups', 'durations', 'tags'));
    }

    public function showAddRecipePage() {
        return view('addRecipe');
    }

    // public function updateTagPage(Request $req) {
    //     $user = Auth::user();
    //     $cmd = $req->input('cmd');

    //     if ($cmd != null) {
    //         $selected_tags = collect($req->input('selected_tags'))->map(function ($tag) {
    //             return strtolower($tag);
    //         });
    //         $curr_tag = strtolower($req->input('curr_tag'));
    //         if ($cmd == 'remove') {
    //             $selected_tags = $selected_tags->reject(function ($item) use ($curr_tag) {
    //                 return $item == $curr_tag;
    //             });
    //         } else if ($selected_tags->doesntContain($curr_tag)) {
    //             $selected_tags->push($curr_tag);
    //         }
    //     } else {
    //         $selected_tags = [];
    //     }
    //     // dd([$cmd, $selected_tags]);
    //     return back()->with('selected_tags', $selected_tags)
    //                  ->with($req->all());
    // }
}

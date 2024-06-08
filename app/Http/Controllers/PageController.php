<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Tag;
use App\Models\AvoidedIngredient;
use App\Models\UserIngredientProgress;
use App\Models\UserToolProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    protected $category_all;
    protected $tag_all;
    protected $top_ingredients;

    public function __construct(){
        View::share('duration_minutes', [15, 30, 45, 60]);

        $this->category_all = Cache::remember('category_all', 60*3, function (){
            $category_all = Category::all();
            return $category_all;
        });
        View::share('category_all', $this->category_all);

        $this->tag_all = Cache::remember('tag_all', 60*3, function (){
            $tag_all = Tag::all();
            return $tag_all;
        });
        View::share('tag_all', Tag::all());

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

        $default = $req->session()->get('default_'.$type, []);
        $selected = $req->session()->get('selected_'.$type, []);
        $saved = $req->session()->get('saved_'.$type, []);

        $idx = array_search($value, $selected);
        if ($type == 'ingredients') {
            $curr_default = $this->top_ingredients;
        } else if ($type == 'tags') {
            $curr_default = $this->tag_all->pluck('name')->toArray();
            $idx_3 = array_search($value, $default);
            if ($idx_3 === false && $cmd == 'add') {
                $value = '';
            }
        }
        $idx_2 = array_search($value, $curr_default);

        if ($cmd == 'add' && $idx === false && !empty($value)) {
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
        $changes = $selected != $saved;
        $req->session()->put('changes', $changes);
        return response()->json(['updateStatus' => $updateStatus, 'updateBtn' => $updateBtn, 'changes' => $changes]);
    }

    public function showResult(Request $req) {
        $query = $req->input('query');
        $type = $req->input('type').'s';

        if ($type == 'ingredients') {
            $selected = $req->session()->get('selected_'.$type, []);
            $results = Ingredient::where('name', 'LIKE', '%'.$query.'%')->whereNotIn('name', $selected)->get();
        } else if ($type == 'tags') {
            $selected = $req->session()->get('selected_'.$type, []);
            $results = Tag::where('name', 'LIKE', '%'.$query.'%')->whereNotIn('name', $selected)->get();
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
        $selected_ingredients = $saved_ingredients;
        $default_ingredients = array_diff($this->top_ingredients, $selected_ingredients);

        $req->session()->put('saved_ingredients', $saved_ingredients);
        $req->session()->put('selected_ingredients', $selected_ingredients);
        $req->session()->put('default_ingredients', $default_ingredients);
        sort($selected_ingredients);
        sort($saved_ingredients);
        $changes = $selected_ingredients != $saved_ingredients;
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
        $user_ingredients = $user? UserIngredientProgress::where('user_id', $user->id)->where('recipe_id', $recipe_id)->get() : null;
        $user_tools = $user? UserToolProgress::where('user_id', $user->id)->where('recipe_id', $recipe_id)->get() : null;
        if ((isset($user) && $recipe->user_id === $user->id) || $recipe->isPublic()) {
            return view('recipeDetail', compact('recipe', 'user', 'reviews', 'user_ingredients', 'user_tools'));
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

    public function showAddRecipePage(Request $req) {
        $selected_tags = $req->session()->get('selected_tags', []);
        $default_tags = array_diff($this->tag_all->pluck('name')->toArray(), $selected_tags);

        $req->session()->put('selected_tags', $selected_tags);
        $req->session()->put('default_tags', $default_tags);
        return view('addRecipe');
    }

    public function showResultInputTag(Request $req) {
        $query = $req->input('query');

        $selected_tags = $req->session()->get('selected_tags', []);
        $default_tags = array_diff($this->tag_all->pluck('name')->toArray(), $selected_tags);

        $matching_tags = Tag::where('name', 'LIKE', '%' . $query . '%')->pluck('name')->toArray();
        $tags = array_intersect($default_tags, $matching_tags);
        sort($tags);
        return response()->json(['tags' => $tags]);
    }

    public function showMyCookingProgressPage(){
        $user = Auth::user();
        $recipes = $user->cookingProgressRecipes();
        return view('myCookingProgress', compact('user', 'recipes'));
    }

    public function showPublicProfilePage($public_profile_id){
        $user = Auth::user();
        $public_profile = User::find($public_profile_id);
        return view('publicProfile', compact('user', 'public_profile'));
    }
}

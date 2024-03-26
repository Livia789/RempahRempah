<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class PageController extends Controller
{
    public function showHomePage() {
        return view('home');
    }

    public function showLoginPage() {
        return view('login');
    }

    public function showRegisterPage() {
        return view('register');
    }

    public function showAvoidedIngredientsPage(){
        $user = Auth::user();
        $avoidedIngredients = $user->avoidedIngredients;
        return view('temp/avoidedIngredients', compact('user', 'avoidedIngredients'));
    }

    public function showMyRecipesPage(){
        $user = Auth::user();
        $myRecipes = $user->recipes;
        return view('temp/myRecipes', compact('user', 'myRecipes'));
    }

    public function showMyReviewsPage(){
        $user = Auth::user();
        $myReviews = $user->reviews;
        return view('temp/myReviews', compact('user', 'myReviews'));
    }

    public function showMyBookmarksPage(){
        $user = Auth::user();
        $bookmarks = $user->bookmarks;
        return view('temp/bookmarks', compact('user', 'bookmarks'));
    }

    public function showRecipeDetailPage($recipe_id){
        $user = Auth::user();
        $recipe = Recipe::find($recipe_id);
        if ($recipe->user_id === $user->id || $recipe->isPublic()) {
            return view('temp/recipeDetail', compact('recipe'));
        } else {
            echo "You are not authorized to view this recipe. TODO: handle ini pagenya mau gimana";
        }
    }

    public function showRecipesPage(Request $req){
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $query = Recipe::where(function ($query) use ($user_id) {
                $query->where('user_id', $user_id)
                    ->orWhere('type', 'public');
            });
        } else {
            $query = Recipe::where('type', 'public');
        }

        $name = $req->input('name');
        $category = $req->input('category');
        $duration = $req->input('duration');
        // $tag = $req->input('tag');

        if ($name) {
            $query->where('name', 'like', '%'.$name.'%')
                  ->orWhereHas('ingredientHeaders.ingredients', function ($query) use ($name) {
                    $query->where('name', 'like', '%'.$name.'%');
            });
        }

        if ($category) {
            $query->where('category_id', $category);
        }

        if ($duration) {
            if ($duration < 0) {
                $query->where('duration', '>', 90);
            } else {
                $query->where('duration', '<=', $duration);
            }
        }

        // if ($tag) {
        //     $query->whereHas('tags', function ($q) use ($tag) {
        //         $q->where('name', $tag);
        //     });
        // }

        $recipes = $query->paginate(10);

        return view('recipes', compact('recipes'));
    }
}

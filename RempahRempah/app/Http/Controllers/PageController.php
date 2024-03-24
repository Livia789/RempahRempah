<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

class PageController extends Controller
{
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

}

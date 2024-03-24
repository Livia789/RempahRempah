<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}

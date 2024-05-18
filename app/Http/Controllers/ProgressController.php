<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepProgress;
use App\Models\UserToolProgress;
use App\Models\UserIngredientProgress;
use App\Models\Recipe;

class ProgressController extends Controller
{
    public function resetCookingProgress(Request $req){
        UserToolProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->delete();
        UserIngredientProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->delete();
        StepProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->delete();
        return response()->json(['message' => 'ok done reset cooking progress']);
    }
}

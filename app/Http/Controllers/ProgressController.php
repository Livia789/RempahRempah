<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepProgress;
use App\Models\UserToolProgress;
use App\Models\UserIngredientProgress;
use App\Models\Recipe;
use Session;
use Auth;

class ProgressController extends Controller
{
    public function resetCookingProgress(Request $req){
        if(Auth::user()){
            UserToolProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->delete();
            UserIngredientProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->delete();
            StepProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->delete();
        }else{
            Session::forget('recipe_'.$req->recipe_id);
        }
            

        return response()->json(['message' => 'ok done reset cooking progress']);
    }

    public function guest_getCookingProgress(Request $req){
        $recipe_id = $req->recipe_id;
        return Session::get('recipe_'.$recipe_id);
    }
}

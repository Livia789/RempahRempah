<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserIngredientProgress;
use Session;

class UserIngredientProgressController extends Controller
{
    public function addUserIngredientProgress($ingredient_id, $recipe_id){
        $progress = new UserIngredientProgress;
        $progress->user_id = auth()->id();
        $progress->ingredient_id = $ingredient_id;
        $progress->recipe_id = $recipe_id;
        $progress->save();

        $progress = UserIngredientProgress::where('user_id', auth()->id())->where('ingredient_id', $ingredient_id)->where('recipe_id', $recipe_id)->exists();
        return response()->json([
            'message' => 'Progress added',
            'isProgress' => $progress
        ]);
    }
    
    public function removeUserIngredientProgress($ingredient_id, $recipe_id){
        UserIngredientProgress::where('user_id', auth()->id())->where('recipe_id', $recipe_id)->where('ingredient_id', $ingredient_id)->delete();

        $progress = UserIngredientProgress::where('user_id', auth()->id())->where('recipe_id', $recipe_id)->where('ingredient_id', $ingredient_id)->exists();
        return response()->json([
            'message' => 'Progress removed',
            'isProgress' => $progress
        ]);
    }

    public function guest_toggleUserIngredientProgress($ingredient_id, $recipe_id){
        $cookingProgress = Session::get('recipe_'.$recipe_id) ?? [
            'tools' => [],
            'ingredients' => [],
            'steps' => []
        ];

        if(in_array($ingredient_id, $cookingProgress['ingredients'])){
            $message = 'ok exists';
            $removeIndex = array_search($ingredient_id, $cookingProgress['ingredients']);
            unset($cookingProgress['ingredients'][$removeIndex]);
            $cookingProgress['ingredients'] = array_values($cookingProgress['ingredients']);
        }else{
            $message = 'not exists';
            array_push($cookingProgress['ingredients'], $ingredient_id);
        }

        Session::put('recipe_'.$recipe_id, $cookingProgress);
        
        return response()->json([
            'cookingProgress' => Session::get('recipe_'.$recipe_id)
        ]);
    }
    
    public function toggleUserIngredientProgress(Request $req)
    {
        if(auth()->check()){
            $progress = UserIngredientProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->where('ingredient_id', $req->ingredient_id)->exists();
            if($progress){
                return $this->removeUserIngredientProgress($req->ingredient_id, $req->recipe_id);
            }else{
                return $this->addUserIngredientProgress($req->ingredient_id, $req->recipe_id);
            }
        }else{
            return $this->guest_toggleUserIngredientProgress($req->ingredient_id, $req->recipe_id);
        }
    }

}

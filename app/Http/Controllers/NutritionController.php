<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nutrition;
use App\Models\Recipe;
use App\Models\User;

class NutritionController extends Controller
{
    function addNutrition(Request $req){
        $recipe = Recipe::find($req->recipe_id);
        if($req->energiTotal && $req->energiDariLemak && $req->nutrition){
            $recipe->nutrition()->sync($req->nutrition);

            $recipe->energiTotal = $req->energiTotal;
            $recipe->energiDariLemak = $req->energiDariLemak;
            $recipe->is_verified_by_ahli_gizi = true;
            $recipe->save();

            $email = User::where('id', $recipe->user_id)->first()->email;
            app('App\\Http\\Controllers\\EmailController')->sendRecipeUpdateMail($email, $recipe->name, null, 'ahli_gizi', true);
            return redirect()->back();
        }
        return redirect()->back()->with('error', 'Gagal menambahkan data nutrisi');
    }
}

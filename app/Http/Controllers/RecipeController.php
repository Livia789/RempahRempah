<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Validator;

class RecipeController extends Controller
{
    public function addRecipe(Request $req) {
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'category_id' => 'required',
            'sub_category_1_id' => 'required',
            'sub_category_2_id' => 'required'
            // 'duration' => 'required|'
            // img, vid, type
        ];

        $messages = [
            'name.required' => 'Nama belum diisi.',
            'name.min' => 'Nama minimal :min karakter.',
            'description.required' => 'Deskripsi belum diisi.',
            'description.min' => 'Deskripsi minimal :min karakter.'
            // 'password.alpha_num' => 'Kata sandi hanya dapat terdiri dari huruf dan angka.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->with($req->all());
        } else {
            $recipe = new Recipe();
            $recipe->name = $req->name;
            $recipe->description = $req->description;
            $recipe->category_id = $req->category_id;
            $recipe->sub_category_1_id = $req->sub_category_1_id;
            $recipe->sub_category_2_id = $req->sub_category_2_id;

            $recipe->save();

            return redirect('/');
        }
    }
}

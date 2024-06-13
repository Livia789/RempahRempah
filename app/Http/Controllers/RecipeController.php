<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\IngredientHeader;
use App\Models\Ingredient;
use App\Models\StepHeader;
use App\Models\Step;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function addRecipe(Request $req) {
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'category_id' => 'required',
            'duration' => 'required|numeric|min:1',
            'selected_tags' => 'required|array|min:1',
            'selected_tags.*' => 'required|string',
            'type' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'vid' => 'nullable|file|mimes:mp4,mov|max:20480',
            'ingredientHeader.*' => 'required|min:5',
            'ingredientDescription.*.*' => 'required|min:5',
            'ingredientQty.*.*' => 'required|min:1',
            'ingredientUnit.*.*' => 'required|min:1',
            'stepHeader.*' => 'required|min:5',
            'stepDescription.*.*' => 'required|min:5',
            'stepImg.*.*' => 'nullable|file|mimes:jpeg,jpg,png|max:2048'
        ];

        $messages = [
            'name.required' => 'Nama belum diisi.',
            'name.min' => 'Nama minimal :min karakter.',
            'description.required' => 'Deskripsi belum diisi.',
            'description.min' => 'Deskripsi minimal :min karakter.',
            'category_id.required' => 'Kategori Utama belum diisi.',
            'duration.required' => 'Durasi belum diisi.',
            'duration.numeric' => 'Durasi harus berupa angka.',
            'duration.min' => 'Durasi minimal :min menit.',
            'selected_tags.required' => 'Tag minimal dipilih satu.',
            'type.required' => 'Tipe resep belum dipilih.',
            'img.required' => 'Foto tampilan utama belum dipilih.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar yang diterima: jpeg, png, jpg.',
            'img.max' => 'Ukuran gambar maksimal :max kilobita.',
            'vid.mimes' => 'Format video yang diterima: mp4, mov.',
            'vid.max' => 'Ukuran video maksimal :max kilobita.',
            'ingredientHeader.*.required' => 'Judul header bahan belum diisi.',
            'ingredientHeader.*.min' => 'Judul header bahan minimal :min karakter.',
            'ingredientDescription.*.*.required' => 'Bahan belum diisi.',
            'ingredientDescription.*.*.min' => 'Bahan minimal :min karakter.',
            'ingredientQty.*.*.required' => 'Jumlah belum diisi.',
            'ingredientQty.*.*.min' => 'Jumlah minimal :min karakter.',
            'ingredientUnit.*.*.required' => 'Satuan belum diisi.',
            'ingredientUnit.*.*.min' => 'Satuan minimal :min karakter.',
            'stepHeader.*.required' => 'Judul header langkah belum diisi.',
            'stepHeader.*.min' => 'Judul header langkah minimal :min karakter.',
            'stepDescription.*.*.required' => 'Deskripsi langkah belum diisi.',
            'stepDescription.*.*.min' => 'Deskripsi langkah minimal :min karakter.',
            'stepImg.*.*.mimes' => 'Format gambar yang diterima: jpeg, png, jpg.',
            'stepImg.*.*.max' => 'Ukuran gambar maksimal :max kilobita.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            $req->session()->regenerateToken();
            $inputExceptFiles = $req->except('vid', 'img', 'stepImg');
            return back()->withErrors($validator)
                         ->with($inputExceptFiles);
        } else {
            $user_id = Auth::user()->id;
            $recipe = new Recipe();
            $recipe->user_id = $user_id;
            $recipe->name = $req->name;
            $recipe->description = $req->description;
            $recipe->category_id = $req->category_id;
            $recipe->sub_category_1_id = $req->sub_category_1_id;
            $recipe->sub_category_2_id = $req->sub_category_2_id;
            $recipe->duration = $req->duration;
            $recipe->type = $req->type;
            Log::info($req->type);
            $recipe->save();

            $folderPath = 'recipes/'.$recipe->id.'/';
            $img = $req->file('img');
            $imgName = 'recipe'.$recipe->id.'.img.'.$img->getClientOriginalExtension();
            Storage::putFileAs('public/'.$folderPath, $img, $imgName);
            $recipe->img = 'storage/'.$folderPath.$imgName;

            if ($req->hasFile('vid')) {
                $vid = $req->file('vid');
                $vidName = 'recipe'.$recipe->id.'.vid.'.$vid->getClientOriginalExtension();
                Storage::putFileAs('public/'.$folderPath, $vid, $vidName);
                $recipe->vid = 'storage/'.$folderPath.$vidName;
            }
            $recipe->save();

            foreach ($req->ingredientHeader as $idx => $header) {
                $ingredientHeader = new IngredientHeader();
                $ingredientHeader->recipe_id = $recipe->id;
                $ingredientHeader->name = $header;
                $ingredientHeader->save();

                foreach ($req->input('ingredientDescription')[$idx] as $idx2 => $description) {
                    $ingredient = Ingredient::firstOrCreate(['name' => $description]);

                    $ingredientHeader->ingredients()->attach($ingredient->id, [
                        'quantity' => $req->input('ingredientQty')[$idx][$idx2],
                        'unit' => $req->input('ingredientUnit')[$idx][$idx2]
                    ]);
                }
            }

            foreach ($req->stepHeader as $idx => $header) {
                $stepHeader = new StepHeader();
                $stepHeader->recipe_id = $recipe->id;
                $stepHeader->name = $header;
                $stepHeader->save();

                foreach ($req->stepDescription[$idx] as $idx2 => $description) {
                    $step = new Step();
                    $step->step_header_id = $stepHeader->id;
                    $step->step_desc = $description;

                    if ($req->hasFile('stepImg.'.$idx.'.'.$idx2)) {
                        $stepImg = $req->file('stepImg.'.$idx.'.'.$idx2);
                        $imgName = 'recipe'.$recipe->id.'.img_'.$idx.'.'.$idx2.'.'.$stepImg->getClientOriginalExtension();
                        Storage::putFileAs('public/'.$folderPath, $stepImg, $imgName);
                        $step->step_img = 'storage/'.$folderPath.$imgName;
                    }
                    $step->save();
                }
            }
            // harusnya ke myRecipes tp blm ada jd temp ke /
            return redirect('/')->with('successMessage', 'Resep berhasil didaftarkan.');
        }
    }

    public function rejectRecipe(Request $req) {
        if(!$req->rejectionReason){
            return redirect()->back()->with('error', 'Mohon isi alasan penolakan resep.');
        }
        $recipe = Recipe::find($req->recipe_id);
        $recipe->rejectionReason = $req->rejectionReason;
        $recipe->save();
        return redirect()->back();
    }

    public function approveRecipe(Request $req) {
        if($req->adminApproveRecipeConfirmationText == 'terima'){
            $recipe = Recipe::find($req->recipe_id);
            $recipe->is_verified_by_admin = true;

            //get all users
            $all_users = User::where('role', 'ahligizi')->get();

            $ahli_gizi = User::where('role', 'ahligizi')->get()
                            ->map(function ($user) {
                                $user->recipe_count = Recipe::where('ahli_gizi_id', $user->id)
                                                            ->where('is_verified_by_ahli_gizi', false)
                                                            ->count();
                                return $user;
                            })->sortBy('recipe_count')->first();
            $recipe->ahli_gizi_id = $ahli_gizi->id;
            $recipe->save();
        }
        return redirect()->back();
    }
}

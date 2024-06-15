<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\IngredientHeader;
use App\Models\Ingredient;
use App\Models\StepHeader;
use App\Models\Step;
use App\Models\User;
use App\Models\Tag;
use App\Models\Tool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function addRecipe(Request $req) {
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'category_id' => 'required',
            'duration' => 'required|numeric|min:1',
            'serving' => 'required|numeric|min:1',
            'selected_tags' => 'required|array|min:1',
            'selected_tags.*' => 'required|string',
            'type' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'vid' => 'nullable|file|mimes:mp4,mov|max:20480',
            'tool.*' => 'required|min:3',
            'ingredientHeader.*' => 'required|min:3',
            'ingredientDescription.*.*' => 'required|min:3',
            'ingredientQty.*.*' => 'required',
            'stepHeader.*' => 'required|min:3',
            'stepDescription.*.*' => 'required|min:3',
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
            'serving.required' => 'Sajian belum diisi.',
            'serving.numeric' => 'Sajian harus berupa angka.',
            'serving.min' => 'Sajian minimal :min.',
            'selected_tags.required' => 'Tag minimal dipilih satu.',
            'type.required' => 'Tipe resep belum dipilih.',
            'img.required' => 'Foto tampilan utama belum dipilih.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar yang diterima: jpeg, png, jpg.',
            'img.max' => 'Ukuran gambar maksimal :max kilobita.',
            'vid.mimes' => 'Format video yang diterima: mp4, mov.',
            'vid.max' => 'Ukuran video maksimal :max kilobita.',
            'tool.*.required' => 'Alat belum diisi.',
            'tool.*.min' => 'Alat minimal :min karakter.',
            'ingredientHeader.*.required' => 'Judul header bahan belum diisi.',
            'ingredientHeader.*.min' => 'Judul header bahan minimal :min karakter.',
            'ingredientDescription.*.*.required' => 'Bahan belum diisi.',
            'ingredientDescription.*.*.min' => 'Bahan minimal :min karakter.',
            'ingredientQty.*.*.required' => 'Jumlah belum diisi.',
            'stepHeader.*.required' => 'Judul header langkah belum diisi.',
            'stepHeader.*.min' => 'Judul header langkah minimal :min karakter.',
            'stepDescription.*.*.required' => 'Deskripsi langkah belum diisi.',
            'stepDescription.*.*.min' => 'Deskripsi langkah minimal :min karakter.',
            'stepImg.*.*.mimes' => 'Format gambar yang diterima: jpeg, png, jpg.',
            'stepImg.*.*.max' => 'Ukuran gambar maksimal :max kilobita.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);
        if ($validator->fails()) {
            $inputExceptFiles = $req->except('vid', 'img', 'stepImg', '_token');
            return back()->withErrors($validator)
                         ->with($inputExceptFiles);
        } else {
            $user_id = Auth::user()->id;
            $recipe = new Recipe();
            $recipe->user_id = $user_id;
            $recipe->name = $req->name;
            $recipe->description = $req->description;
            if (Auth::user()->role == 'admin') {
                $recipe->company_id = $req->company;
            }
            $recipe->category_id = $req->category_id;
            $recipe->sub_category_1_id = $req->sub_category_1_id;
            $recipe->sub_category_2_id = $req->sub_category_2_id;
            $recipe->duration = $req->duration;
            $recipe->serving = $req->serving;
            $recipe->type = $req->type;

            if ($req->type == 'public') {
                $admin = User::where('role', 'admin')->get()
                                ->map(function ($user) {
                                    $user->recipe_count = Recipe::where('admin_id', $user->id)
                                                                ->where('is_verified_by_admin', false)
                                                                ->count();
                                    return $user;
                                })->sortBy('recipe_count')->first();
                $recipe->admin_id = $admin->id;
            } else if ($req->type == 'exclusive') {
                $recipe->admin_id = Auth::user()->id;
                $recipe->is_verified_by_admin = true;
                $ahli_gizi = User::where('role', 'ahli_gizi')->get()
                                ->map(function ($user) {
                                    $user->recipe_count = Recipe::where('ahli_gizi_id', $user->id)
                                                                ->where('is_verified_by_ahli_gizi', false)
                                                                ->count();
                                    return $user;
                                })->sortBy('recipe_count')->first();
                $recipe->ahli_gizi_id = $ahli_gizi->id;
            }
            $recipe->save();

            $folderPath = 'recipeAssets/recipes'.$recipe->id.'/';
            $img = $req->file('img');
            $imgName = 'recipes'.$recipe->id.'.'.$img->getClientOriginalExtension();
            Storage::putFileAs('public/'.$folderPath, $img, $imgName);
            $recipe->img = 'storage/'.$folderPath.$imgName;
            if ($req->hasFile('vid')) {
                $vid = $req->file('vid');
                $vidName = 'recipes'.$recipe->id.'.'.$vid->getClientOriginalExtension();
                Storage::putFileAs('public/'.$folderPath, $vid, $vidName);
                $recipe->vid = 'storage/'.$folderPath.$vidName;
            }
            $recipe->save();

            foreach ($req->selected_tags as $idx => $tag) {
                $tag = Tag::where('name', $tag)->first();
                $recipe->tags()->attach($tag->id);
            }
            foreach ($req->tool as $idx => $tool) {
                $tool = Tool::firstOrCreate(['name' => $tool]);
                $exists = $recipe->tools()->where('tool_id', $tool->id)->exists();
                if (!$exists) {
                    $recipe->tools()->attach($tool->id);
                }
            }

            foreach ($req->ingredientHeader as $idx => $header) {
                $ingredientHeader = new IngredientHeader();
                $ingredientHeader->recipe_id = $recipe->id;
                $ingredientHeader->name = $header;
                $ingredientHeader->save();

                foreach ($req->ingredientDescription[$idx] as $idx2 => $description) {
                    $ingredient = Ingredient::firstOrCreate(['name' => $description]);
                    $exists = $ingredientHeader->ingredients()->where('ingredient_id', $ingredient->id)->exists();
                    if (!$exists) {
                        $ingredientHeader->ingredients()->attach($ingredient->id, [
                            'quantity' => $req->ingredientQty[$idx][$idx2],
                            'unit' => $req->ingredientUnit[$idx][$idx2]
                        ]);
                    }
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
                        $imgName = 'recipes'.$recipe->id.'.'.$idx.'.'.$idx2.'.'.$stepImg->getClientOriginalExtension();
                        Storage::putFileAs('public/'.$folderPath, $stepImg, $imgName);
                        $step->step_img = 'storage/'.$folderPath.$imgName;
                    }
                    $step->save();
                }
            }
            Session::forget('selected_tags');

            if ($recipe->type == 'public') {
                $email = User::where('id', $recipe->user_id)->first()->email;
                app('App\\Http\\Controllers\\EmailController')->sendRecipeUpdateMail($email, $recipe->name, null, null, null);
            } else if ($recipe->type == 'exclusive') {
                $email = User::where('id', $recipe->user_id)->first()->email;
                app('App\\Http\\Controllers\\EmailController')->sendRecipeUpdateMail($email, $recipe->name, null, 'admin', true);
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
        $email = User::where('id', $recipe->user_id)->first()->email;
        app('App\\Http\\Controllers\\EmailController')->sendRecipeUpdateMail($email, $recipe->name, $req->rejectionReason, 'admin', false);
        return redirect()->back();
    }

    public function approveRecipe(Request $req) {
        if($req->adminApproveRecipeConfirmationText == 'terima'){
            $recipe = Recipe::find($req->recipe_id);
            $recipe->is_verified_by_admin = true;

            $ahli_gizi = User::where('role', 'ahli_gizi')->get()
                            ->map(function ($user) {
                                $user->recipe_count = Recipe::where('ahli_gizi_id', $user->id)
                                                            ->where('is_verified_by_ahli_gizi', false)
                                                            ->count();
                                return $user;
                            })->sortBy('recipe_count')->first();
            $recipe->ahli_gizi_id = $ahli_gizi->id;
            $recipe->save();

            $email = User::where('id', $recipe->user_id)->first()->email;
            app('App\\Http\\Controllers\\EmailController')->sendRecipeUpdateMail($email, $recipe->name, null, 'admin', true);
        }
        return redirect()->back();
    }
}

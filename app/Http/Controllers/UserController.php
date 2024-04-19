<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AvoidedIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $req) {
        $credentials = [
            'email' =>  $req->email,
            'password' => $req->password
        ];

        if ($req->remember) {
            Cookie::queue('mycookie', $req->email, 120);
        }

        if(Auth::attempt($credentials, true)) {
            return redirect('/')->with('loginSuccess', 'Selamat datang kembali, '.Auth::user()->name.'!');
        } else {
            return back()->with('loginFailed', 'Email atau kata sandi salah.');
        }
    }

    public function register(Request $req) {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|alpha_num|min:6',
            'password_conf' => 'required|same:password'
        ];

        $messages = [
            'name.required' => 'Nama belum diisi.',
            'name.min' => 'Nama minimal :min karakter.',
            'email.required' => 'Email belum diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi belum diisi.',
            'password.alpha_num' => 'Kata sandi hanya dapat terdiri dari huruf dan angka.',
            'password.min' => 'Kata sandi minimal :min karakter.',
            'password_conf.required' => 'Konfirmasi kata sandi belum diisi.',
            'password_conf.same' => 'Konfirmasi kata sandi harus sama dengan kata sandi.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = bcrypt($req->password);

            $user->save();

            Auth::attempt([
                'email' => $req->email,
                'password' => $req->password
            ], true);

            return redirect('/welcome');
        }
    }

    public function resetPassword(Request $req) {
        $rules = [
            'email' => 'required',
            'token' => 'required|min:20',
            'password' => 'required|alpha_num|min:6',
            'password_conf' => 'required|same:password'
        ];

        $messages = [
            'email.required' => 'Email belum diisi.',
            'token.required' => 'Kode belum diisi.',
            'token.min' => 'Kode minimal :min karakter.',
            'password.required' => 'Kata sandi baru belum diisi.',
            'password.alpha_num' => 'Kata sandi baru hanya dapat terdiri dari huruf dan angka.',
            'password.min' => 'Kata sandi baru minimal :min karakter.',
            'password_conf.required' => 'Konfirmasi kata sandi baru belum diisi.',
            'password_conf.same' => 'Konfirmasi kata sandi baru harus sama dengan kata sandi.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                         ->with('email', $req->email);
        } else {
            $verify = DB::table('password_resets')
                        ->where('email', $req->email)
                        ->where('token', $req->token)
                        ->where('expires_at', '>', Carbon::now())->first();

            if ($verify) {
                DB::table('password_resets')->where('email', $verify->email)->delete();

                $user = User::where('email', $verify->email)->first();
                $user->password = bcrypt($req->password);
                $user->save();

                return redirect('/login')->with('resetPasswordSuccess', 'Kata sandi berhasil diganti.');
            } else {
                return back()->with('resetPasswordFailed', 'Kode salah atau sudah kedaluwarsa.')
                             ->with('email', $req->email);
            }
        }
    }

    public function updateProfile(Request $req) {
        $user = Auth::user();
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id,
        ];

        $messages = [
            'name.required' => 'Nama belum diisi.',
            'name.min' => 'Nama minimal :min karakter.',
            'email.required' => 'Email belum diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->with('updateProfileFailed', $validator->errors()->first());
        } else {
            $user->name = $req->name;
            $user->email = $req->email;
            $user->save();
            return back()->with('updateProfileSuccess', 'Profil berhasil diperbaharui!');
        }
    }

    public function updatePassword(Request $req) {
        $user = Auth::user();
        $rules = [
            'password' => 'required|alpha_num|min:6',
            'password_conf' => 'required|same:password'
        ];

        $messages = [
            'password.required' => 'Kata sandi belum diisi.',
            'password.alpha_num' => 'Kata sandi hanya dapat terdiri dari huruf dan angka.',
            'password.min' => 'Kata sandi minimal :min karakter.',
            'password_conf.required' => 'Konfirmasi kata sandi belum diisi.',
            'password_conf.same' => 'Konfirmasi kata sandi harus sama dengan kata sandi.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);


        if ($validator->fails()) {
            return back()->with('updatePasswordFailed', $validator->errors()->first());
        } else {
            $user->password = bcrypt($req->password);
            $user->save();
            return back()->with('updatePasswordSuccess', 'Kata sandi berhasil diperbaharui!');
        }
    }

    public function updatePreferences(Request $req) {
        $user = Auth::user();
        $avoided_ingredients = $user->avoidedIngredients->pluck('ingredient_name');
        $selected_ingredients = collect($req->input('selected_ingredients'));
        $src = $req->input('source_view');

        $diff = $selected_ingredients->diff($avoided_ingredients);
        foreach($diff as $ingredient) {
            $avoided_ingredient = new AvoidedIngredient();
            $avoided_ingredient->user_id = $user->id;
            $avoided_ingredient->ingredient_name = $ingredient;
            $avoided_ingredient->save();
        }

        if ($src == 'welcome') {
            return redirect('/')->with('loginSuccess', 'Data berhasil disimpan.');
        } else {
            return back()->with('updateSuccess', 'Data berhasil disimpan.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
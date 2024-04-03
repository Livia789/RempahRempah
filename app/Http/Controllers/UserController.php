<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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
            return back()->withErrors(['Email atau kata sandi salah.']);
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

            // redirect ke preference sm session tp nanti yak
            return redirect('/');
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
            return redirect()->back()->with('updateProfileFailed', $validator->errors()->first());
        } else {
            $user->name = $req->name;
            $user->email = $req->email;
            $user->save();
            return redirect()->back()->with('updateProfileSuccess', 'Profil berhasil diperbaharui!');
        }
    }

    public function updatePassword(Request $req){
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
            return redirect()->back()->with('updatePasswordFailed', $validator->errors()->first());
        } else {
            $user->password = bcrypt($req->password);
            $user->save();
            return redirect()->back()->with('updatePasswordSuccess', 'Kata sandi berhasil diperbaharui!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}

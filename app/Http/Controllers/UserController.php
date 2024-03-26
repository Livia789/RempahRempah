<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function login (Request $req) {
        $credentials = [
            'email' =>  $req->email,
            'password' => $req->password
        ];

        if ($req->remember) {
            Cookie::queue('mycookie', $req->email, 120);
        }

        if(Auth::attempt($credentials, true)) {
            return redirect('/');
        } else {
            return back()->withErrors(['Email atau kata sandi salah.']);
        }
    }

    public function logout () {
        Auth::logout();
        return redirect('/');
    }
}

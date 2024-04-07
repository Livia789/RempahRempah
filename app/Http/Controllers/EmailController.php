<?php

namespace App\Http\Controllers;

use App\Mail\generalEmail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class EmailController extends Controller
{
    public function sendResetPasswordMail(Request $req){
        $email = $req->email;
        $rules = [
            'email' => 'required|email:rfc,dns|exists:users,email',
        ];

        $messages = [
            'email.required' => 'Email belum diisi.',
            'email.email' => 'Email tidak valid.',
            'email.exists' => 'Email belum terdaftar.',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::where('email', $email)->first();
        $currentTime = Carbon::now();
        $verify = DB::table('password_resets')
                    ->where('email', $email)
                    ->where('expires_at', '>', $currentTime)->first();

        if ($verify) {
            $timeGap = $currentTime->diffInSeconds(Carbon::parse($verify->expires_at));
            return back()->with('mailFailed', "Email gagal dikirim. Mohon gunakan kode rahasia yang dikirim sebelumnya atau tunggu $timeGap detik sebelum kembali melakukan permintaan pengiriman email kode baru.")
                         ->with('email', $email);
        } else {
            $subject = 'Reset Kata Sandi';
            $title = 'RempahRempah';
            $greeting = 'Halo, '.$user->name;
            $body = 'Kami baru saja menerima permintaan untuk mereset kata sandi untuk akunmu yang terhubung dengan email ini. ';
            $body .= 'Kode rahasia ini hanya akan berlaku dalam waktu 5 menit sejak email ini dikirim.\n';
            $body .= 'Masukkan kode berikut agar kamu dapat mengubah kata sandimu.';
            $token = rtrim(chunk_split(Str::random(16), 4, '-'), '-').'!';
            $warning = 'Mohon abaikan email ini jika kamu tidak mengirimkan permintaan ini.';

            DB::table('password_resets')->insert(
                [
                    'email' => $email,
                    'token' => $token,
                    'expires_at' => Carbon::now()->addMinutes(5),
                    'created_at' => Carbon::now()
                ],
            );

            $mail = new generalEmail($subject, $title, $greeting, $body, $token, $warning);
            Mail::to($email)->send($mail);
            return back()->with('mailSuccess', "Email berhasil dikirim. Yuk, cek emailmu sekarang!")
                         ->with('email', $email);
        }
    }
}

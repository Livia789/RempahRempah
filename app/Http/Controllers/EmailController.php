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
    public function sendWelcomeMail($email) {
        $user = User::where('email', $email)->first();

        $subject = 'Selamat datang';
        $title = 'Rempah Rempah';
        $greeting = 'Halo, '.$user->name;
        $body = 'Terima kasih telah mendaftar di Rempah Rempah. Kami sangat senang memiliki kamu sebagai bagian dari komunitas kami. ';
        $body .= 'Jangan ragu untuk menjelajahi fitur-fitur yang tersedia Rempah Rempah. Sekali lagi, selamat datang!';
        $warning = 'Mohon abaikan email ini jika kamu tidak mengirimkan permintaan ini.';

        $mail = new generalEmail($subject, $title, $greeting, $body, null, null, $warning);
        Mail::to($email)->send($mail);
    }

    public function sendResetPasswordMail(Request $req) {
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
            $title = 'Rempah Rempah';
            $greeting = 'Halo, '.$user->name;
            $body = 'Kami baru saja menerima permintaan untuk mereset kata sandi pada akun yang terhubung dengan email ini. ';
            $body .= 'Kode rahasia ini hanya akan berlaku dalam waktu 5 menit sejak email ini dikirim.\n';
            $body .= 'Masukkan kode berikut agar kamu dapat mengubah kata sandimu.';
            $token = rtrim(chunk_split(Str::random(16), 4, '-'), '-').'!';
            $warning = 'Mohon abaikan email ini jika kamu tidak mengirimkan permintaan ini.';

            DB::table('password_resets')->insert(
                [
                    'email' => $email,
                    'token' => $token,
                    'expires_at' => Carbon::now()->addSeconds(30),
                    'created_at' => Carbon::now()
                ],
            );

            $mail = new generalEmail($subject, $title, $greeting, $body, null, $token, $warning);
            Mail::to($email)->send($mail);
            return back()->with('mailSuccess', "Email berhasil dikirim. Yuk, cek emailmu sekarang!")
                         ->with('email', $email);
        }
    }

    public function sendRecipeUpdateMail($email, $recipeTitle, $rejectionReason, $doneBy, $isVerified) {
        $user = User::where('email', $email)->first();
        $subject = 'Status Verifikasi Resep';
        $title = 'Rempah Rempah';
        $greeting = 'Halo, '.$user->name;
        $body = 'Terima kasih telah mendaftarkan resepmu di Rempah Rempah. ';
        $body_2 = null;
        if ($isVerified === null) {
            $body .= 'Resepmu yang berjudul '.$recipeTitle.' akan segera diverifikasi oleh tim kami.';
            $body_2 = 'Segala perkembangan terkait resepmu akan kami kabarkan melalui email ini, jadi jangan lupa cek secara berkala, ya! ';
        } elseif ($isVerified) {
            $body .= 'Selamat! Resepmu yang berjudul '.$recipeTitle.' telah berhasil melewati verifikasi tahap selanjutnya. ';
            if ($doneBy == 'admin') {
                $body .= 'Meskipun begitu, resepmu masih perlu melewati tahap pengisian nilai gizi oleh tim kami agar segera dapat diakses oleh semua pengguna Rempah Rempah.\n';
                $body_2 = 'Segala perkembangan terkait resepmu akan kami kabarkan melalui email ini, jadi jangan lupa cek secara berkala, ya! ';
            } elseif ($doneBy == 'ahli_gizi') {
                $body .= 'Sekarang, resepmu telah dapat diakses oleh semua pengguna Rempah Rempah. Sekali lagi, terima kasih telah menjadi bagian dari Rempah Rempah! ';
            }
        } else {
            $body .= 'Sayangnya, resepmu yang berjudul '.$recipeTitle.' telah gagal melewati verifikasi tahap selanjutnya dengan alasan sebagai berikut:';
            $body_2 = 'Jangan berkecil hati. Kamu masih dapat memperbaiki bagian-bagian resepmu berdasarkan ulasan dari tim kami dan mengirimkannya kembali. Semangat! ';
        }
        $warning = 'Mohon abaikan email ini jika kamu tidak mengirimkan permintaan ini.';

        $mail = new generalEmail($subject, $title, $greeting, $body, $body_2, $rejectionReason, $warning);
        Mail::to($email)->send($mail);
    }
}

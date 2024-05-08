@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Reset Kata Sandi')

@section('content')
    <style>
        body{
            background-color: rgb(33, 37, 41);
        }
    </style>
    <div class="authFlexContainer">
        <div class="banner twoCols"></div>
        <div class="temp" style="margin:auto; width:55%">
            <div class="form">
                <img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah">
                @if (!session('email'))
                    <h6>
                        Masukkan alamat emailmu dan kami akan mengirimkan kode rahasia untuk mereset kata sandimu.
                    </h6>
                    <form action="/sendResetPasswordMail" method="POST">
                        @csrf
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email">
                        </div>
                        @if ($errors->has('email'))
                            <h6 class="errorMsg">{{$errors->first('email')}}</h6>
                        @endif
                        <div class="col d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="btn-submit" value="submit">Reset kata sandi</button>
                        </div>
                        <div class="col">
                            <a href="/login" class="roundedBox blackBackground">Kembali</a>
                        </div>
                    </form>
                @else
                    @if (session('mailSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('mailSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session('mailFailed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('mailFailed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session('resetPasswordFailed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('resetPasswordFailed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h6>
                        Mohon mengisi kode dengan kode rahasia yang telah kami kirim (hanya berlaku dalam 5 menit sejak email dikirim) untuk mengatur kata sandi barumu.
                    </h6>
                    <form action="/resetPassword" method="POST">
                        @csrf
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email" value="{{ session('email') }}" disabled>
                            <input type="hidden" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email" value="{{ session('email') }}">
                        </div>
                        <div class="col">
                            <label for="token" class="form-label">Kode</label>
                            <input type="text" class="form-control textField blackBackground" placeholder="Masukkan kode (20 karakter)" id="token" name="token">
                            @if ($errors->has('token'))
                                <h6 class="errorMsg">{{$errors->first('token')}}</h6>
                            @endif
                        </div>
                        <div class="col">
                            <label for="password" class="form-label">Kata sandi baru</label>
                            <input type="password" class="form-control textField" placeholder="Masukkan kata sandi" id="password" name="password">
                            @if ($errors->has('password'))
                                <h6 class="errorMsg">{{$errors->first('password')}}</h6>
                            @endif
                        </div>
                        <div class="col">
                            <label for="password_conf" class="form-label">Konfirmasi kata sandi baru</label>
                            <input type="password" class="form-control textField" placeholder="Masukkan konfirmasi kata sandi" id="password_conf" name="password_conf">
                            @if ($errors->has('password_conf'))
                                <h6 class="errorMsg">{{$errors->first('password_conf')}}</h6>
                            @endif
                        </div>
                        <div class="col d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="btn-submit" value="submit">Perbarui kata sandi</button>
                        </div>
                        <div class="col">
                            <a href="/login" class="roundedBox blackBackground">Kembali</a>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection

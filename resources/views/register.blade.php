@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Register')

@section('content')
    <style>
        body{
            background-color: rgb(33, 37, 41);
        }
    </style>
    <div class="authFlexContainer">
        <div class="banner"></div>
        <div class="temp" style="margin:auto">
            <div class="form">
                <img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah">
                <h6>
                    Nikmati manfaat seperti menyimpan resep, memberikan komentar, dan banyak lagi dengan <b>mendaftar akun</b>!
                </h6>
                <form action="/register" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Mohon memasukkan input yang sesuai.
                        </div>
                    @endif
                    <div class="col">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control textField" placeholder="Masukkan nama" id="name" name="name">
                        @if ($errors->has('name'))
                            <h6 class="errorMsg">{{$errors->first('name')}}</h6>
                        @endif
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control textField" placeholder="Masukkan email" id="email" name="email">
                        @if ($errors->has('email'))
                            <h6 class="errorMsg">{{$errors->first('email')}}</h6>
                        @endif
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Kata sandi</label>
                        <input type="password" class="form-control textField" placeholder="Masukkan kata sandi" id="password" name="password">
                        @if ($errors->has('password'))
                            <h6 class="errorMsg">{{$errors->first('password')}}</h6>
                        @endif
                    </div>
                    <div class="col">
                        <label for="password_conf" class="form-label">Konfirmasi kata sandi</label>
                        <input type="password" class="form-control textField" placeholder="Masukkan konfirmasi kata sandi" id="password_conf" name="password_conf">
                        @if ($errors->has('password_conf'))
                            <h6 class="errorMsg">{{$errors->first('password_conf')}}</h6>
                        @endif
                    </div>
                    <div class="col d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="btn-submit" value="submit">Daftar</button>
                    </div>
                    <h6>Sudah memiliki akun? <a href="/register" class="urlText">Yuk, masuk di sini!</a></h6>
                </form>
            </div>
        </div>
    </div>
@endsection

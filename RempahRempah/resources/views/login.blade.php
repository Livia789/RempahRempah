@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Login')

@section('content')

    <style>
        body{
            background-color: rgb(33, 37, 41);
        }
    </style>

    <div class="authFlexContainer">
        <div class="banner"></div>
        <div style="margin:auto">
            <div class="form" style="width:100%">
                <img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah">
                <h6>
                    Akses dan simpan semua resep favoritmu dalam <b>SATU AKUN</b>.
                </h6>
                <form action="/login" method="POST">
                    @csrf
                    @if ($errors->any())
                        <h6 class="errorMsg">{{$errors->first()}}</h6>
                    @endif
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control blackInput" placeholder="Masukkan email" id="email" name="email" value="{{Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : ''}}">
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Kata sandi</label>
                        <input type="password" class="form-control blackInput" placeholder="Masukkan kata sandi" id="password" name="password">
                    </div>
                    <div class="col">
                        @if(Cookie::get('mycookie') !== null)
                            <input type="checkbox" name="remember" id="remember" checked>
                        @else
                            <input type="checkbox" name="remember" id="remember">
                        @endif
                        <label class="form-check-label" for="remember"> Ingat saya </label>
                    </div>
                    <div class="col">
                        <a href="/resetKataSandi" class="urlText">Lupa kata sandi?</a>
                    </div>
                    <div class="col d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="btn-submit" value="submit">Log In</button>
                    </div>
                    <h6>Belum memiliki akun? <a href="/register" class="urlText">Yuk, daftar di sini!</a></h6>
                </form>
            </div>
        </div>
    </div>
@endsection

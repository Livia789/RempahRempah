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
        <div class="temp" style="margin:auto">
            <div class="form">
                <img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah">
                <h6>
                    Akses dan simpan semua resep favoritmu dalam <b>SATU AKUN</b>.
                </h6>
                <form action="/login" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email" value="{{Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : ''}}">
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Kata sandi</label>
                        <input type="password" class="form-control textField blackBackground" placeholder="Masukkan kata sandi" id="password" name="password">
                    </div>
                    <div class="col checkBox">
                        <input type="checkbox" name="remember" id="remember" class="blackBackground" {{Cookie::get('mycookie') == null ? "" : "checked"}}>
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    <div class="col">
                        <a href="#" class="roundedBox blackBackground">Lupa kata sandi?</a>
                    </div>
                    <div class="col d-grid gap-2">
                        <button class="btn btn-primary" type="submit" name="btn-submit" value="submit">Masuk</button>
                    </div>
                    <div class="col">
                        Belum memiliki akun? <a href="/register" class="roundedBox blackBackground">Yuk, daftar di sini!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

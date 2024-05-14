@extends('templates/template')

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
        <div class="banner twoCols"></div>
        <div class="temp" style="margin:auto; width:55%">
            <div class="form">
                <img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="RempahRempah">
                <h6>
                    Akses dan simpan semua resep favoritmu dalam <b>SATU AKUN</b>.
                </h6>
                <form action="/login" method="POST">
                    @csrf
                    @if (session('loginFailed'))
                        <div class="alert alert-danger">
                            {{ session('loginFailed') }}
                        </div>
                    @elseif (session('resetPasswordSuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('resetPasswordSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email" value="{{Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : ''}}">
                    </div>
                    <div class="col">
                        <label for="password" class="form-label">Kata sandi</label>
                        <div class="inputWithIconWrapper textField blackBackground">
                            <input type="password" class="form-control textField blackBackground" placeholder="Masukkan kata sandi" id="password" name="password">
                            <img src="/assets/icons/eye_open.png" class="picon" id="toggle_icon_password" onclick="toggleHidePassword('password')" alt="eye_icon">
                        </div>
                    </div>
                    <div class="col checkBox">
                        <input type="checkbox" name="remember" id="remember" class="blackBackground" {{Cookie::get('mycookie') == null ? "" : "checked"}}>
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    <div class="col">
                        <a href="/resetPassword" class="roundedBox blackBackground">Lupa kata sandi?</a>
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
    <script>
        function toggleHidePassword(element) {
            const inputField = document.getElementById(element);
            const type = inputField.getAttribute("type") == "password" ? "text" : "password";
            inputField.setAttribute("type", type);

            const icon = document.getElementById(`toggle_icon_${element}`);
            const iconSource = type === "password" ? "/assets/icons/eye_open.png" : "/assets/icons/eye_closed.png";
            icon.setAttribute("src", iconSource);
        }
    </script>
@endsection

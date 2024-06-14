@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'Rempah Rempah | Reset Kata Sandi')

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
                <img id="logo" src="{{ asset('assets/logo_rempah.png') }}" alt="Rempah Rempah">
                @if (!session('email'))
                    <h6>
                        Masukkan alamat emailmu dan kami akan mengirimkan kode rahasia untuk mereset kata sandimu.
                    </h6>
                    <form action="/sendResetPasswordMail" method="POST">
                        @csrf
                        <div class="col">
                            <label for="email" class="form-label">Email*</label>
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
                        Mohon mengisi kode dengan kode rahasia yang telah kami kirim (hanya berlaku dalam 30 detik sejak email dikirim) untuk mengatur kata sandi barumu.
                    </h6>
                    <form action="/resetPassword" method="POST">
                        @csrf
                        <div class="col">
                            <label for="email" class="form-label">Email*</label>
                            <input type="text" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email" value="{{ session('email') }}" disabled>
                            <input type="hidden" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email" value="{{ session('email') }}">
                        </div>
                        <div class="col">
                            <label for="token" class="form-label">Kode*</label>
                            <input type="text" class="form-control textField blackBackground" placeholder="Masukkan kode (20 karakter)" id="token" name="token">
                            @if ($errors->has('token'))
                                <h6 class="errorMsg">{{$errors->first('token')}}</h6>
                            @endif
                        </div>
                        <div class="col">
                            <label for="password" class="form-label">Kata sandi*</label>
                            <div class="inputWithIconWrapper textField blackBackground">
                                <input type="password" class="form-control textField blackBackground" placeholder="Masukkan kata sandi" id="password" name="password">
                                <img src="/assets/icons/eye_open.png" class="picon" id="toggle_icon_password" onclick="toggleHidePassword('password')" alt="eye_icon">
                            </div>
                            @if ($errors->has('password'))
                                <h6 class="errorMsg">{{$errors->first('password')}}</h6>
                            @endif
                        </div>
                        <div class="col">
                            <label for="password_conf" class="form-label">Konfirmasi kata sandi*</label>
                            <div class="inputWithIconWrapper textField blackBackground">
                                <input type="password" class="form-control textField blackBackground" placeholder="Masukkan konfirmasi kata sandi" id="password_conf" name="password_conf">
                                <img src="/assets/icons/eye_open.png" class="picon" id="toggle_icon_password_conf" onclick="toggleHidePassword('password_conf')" alt="eye_icon">
                            </div>
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

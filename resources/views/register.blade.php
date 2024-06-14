@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'Rempah Rempah | Register')

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
                <h6>
                    Nikmati manfaat seperti menyimpan resep, memberikan komentar, dan banyak lagi dengan <b>mendaftar akun</b>!
                </h6>
                <form action="/register" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Mohon memasukkan data yang sesuai.
                        </div>
                    @endif
                    <div class="col">
                        <label for="name" class="form-label">Nama*</label>
                        <input type="text" class="form-control textField blackBackground" placeholder="Masukkan nama" id="name" name="name">
                        @if ($errors->has('name'))
                            <h6 class="errorMsg">{{$errors->first('name')}}</h6>
                        @endif
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">Email*</label>
                        <input type="text" class="form-control textField blackBackground" placeholder="Masukkan email" id="email" name="email">
                        @if ($errors->has('email'))
                            <h6 class="errorMsg">{{$errors->first('email')}}</h6>
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
                    <div class="col d-grid gap-2 submitCol">
                        <button class="btn btn-primary" type="submit" name="btn-submit" value="submit">Daftar</button>
                    </div>
                    <h6>Sudah memiliki akun? <a href="/login" class="roundedBox blackBackground linkedText">Yuk, masuk di sini!</a></h6>
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

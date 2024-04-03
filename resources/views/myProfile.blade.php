@extends('templates/profile')

@section('title', 'RempahRempah | My Profile')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('profileContent')
<div class="container px-5">
    <h1>Update Profile</h1>
    @if (session('updateProfileFailed'))
        <div class="alert alert-danger">
            {{ "Error: ".session('updateProfileFailed') }}
        </div>
    @elseif(session('updateProfileSuccess'))
        <div class="alert alert-success">
            {{ session('updateProfileSuccess') }}
        </div>
    @endif
    <form action="/updateProfile" style="width:40%;" method="POST">
        @csrf
        <div class="col">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control textField whiteBackground" placeholder="Masukkan Username" id="name" name="name" value="{{ $user->name }}">
        </div>
        <div class="col">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control textField whiteBackground" placeholder="Masukkan email" id="email" name="email" value="{{ $user->email }}">
        </div>
        <button class="sharpBox mt-5" type="submit" name="btn-submit" value="submit">
            <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
            Save Profile
        </button>
    </form>


    <br><br><br>
    <h1>Update Password</h1>
    @if(session('updatePasswordFailed'))
        <div class="alert alert-danger">
            {{ "Error: ".session('updatePasswordFailed') }}
        </div>
    @elseif(session('updatePasswordSuccess'))
        <div class="alert alert-success">
            {{ session('updatePasswordSuccess') }}
        </div>
    @endif
    <form action="/updatePassword" style="width:40%" method="POST">
        @csrf
        <div class="col">
            <label for="password" class="form-label">Kata sandi</label>
            <div class="inputWithIconWrapper textField white">
                <input type="password" class="form-control textField whiteBackground" placeholder="Masukkan kata sandi" id="password" name="password">
                <img src="/assets/icons/eye_open.png" class="picon" id="toggle_icon_password" onclick="toggleHidePassword('password')" alt="eye_icon">
            </div>
        </div>
        <div class="col">
            <label for="password_conf" class="form-label">Konfirmasi Kata sandi</label>
            <div class="inputWithIconWrapper textField white">

                <input type="password" class="form-control textField whiteBackground" placeholder="Masukkan konfirmasi kata sandi" id="password_conf" name="password_conf">
                <img src="/assets/icons/eye_open.png" class="picon" id="toggle_icon_password_conf" onclick="toggleHidePassword('password_conf')" alt="eye_icon">
            </div>
        </div>
        <button class="sharpBox mt-5" type="submit" name="btn-submit" value="submit">
            <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
            Save Password
        </button>
    </form>
</div>
@endsection

<script>
    function toggleHidePassword(element){
        const inputField = document.getElementById(element);
        const type = inputField.getAttribute("type") == "password" ? "text" : "password";
        inputField.setAttribute("type", type);

        const icon = document.getElementById(`toggle_icon_${element}`);
        const iconSource = type === "password" ? "/assets/icons/eye_open.png" : "/assets/icons/eye_closed.png";
        icon.setAttribute("src", iconSource);
    }
</script>
</html>

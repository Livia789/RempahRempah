@extends('templates/profile')

@section('title', 'RempahRempah | Perbarui Kata Sandi')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('profileContent')
<div class="container px-5">
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
            <div class="inputWithIconWrapper textField whiteBackground">
                <input type="password" class="form-control textField whiteBackground" placeholder="Masukkan kata sandi" id="password" name="password">
                <img src="/assets/icons/eye_open.png" class="picon" id="toggle_icon_password" onclick="toggleHidePassword('password')" alt="eye_icon">
            </div>
        </div>
        <div class="col">
            <label for="password_conf" class="form-label">Konfirmasi Kata sandi</label>
            <div class="inputWithIconWrapper textField whiteBackground">
                <input type="password" class="form-control textField whiteBackground" placeholder="Masukkan konfirmasi kata sandi" id="password_conf" name="password_conf">
                <img src="/assets/icons/eye_open.png" class="picon" id="toggle_icon_password_conf" onclick="toggleHidePassword('password_conf')" alt="eye_icon">
            </div>
        </div>
        <button class="sharpBox mt-5" type="submit" name="btn-submit" value="submit">
            <img src="/assets/icons/save_icon.png" class="picon" alt="save_icon">
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

@extends('templates/profile')

@section('title', 'Rempah Rempah | Profil Saya')

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
            <img src="/assets/icons/save_icon.png" class="picon" alt="save_icon">
            Save Profile
        </button>
    </form>
</div>
@endsection
</html>

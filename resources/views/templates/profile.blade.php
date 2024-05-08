@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile/profile.css') }}">
@endsection

@section('content')
    <div class="profileBodyContainer">
        <div class="profileContainer">
            <p style="font-size:30px"><b>Profil Saya</b></p>
            <img src="{{ asset($user->img) }}" class="profilePicture" alt="profile_picture">

            <a href="#" class="sharpBox mx-auto mb-5">
                <img src="assets/icons/edit_icon.png" class="picon" alt="edit_icon">
                Edit Profil
            </a>

            {{--  //TODO: cek buttonnya jalan ga  --}}
            <div class="profileLinks">
                <a href="{{ request()->is('myProfile')? '':'myProfile' }}" id="{{ request()->is('myProfile')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Data Profil</a>
                <a href="{{ request()->is('myReviews')? '':'myReviews' }}" id="{{ request()->is('myReviews')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Ulasan Saya</a>
                <a href="{{ request()->is('myRecipes')? '':'temp/myRecipes' }}" id="{{ request()->is('myRecipes')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Resep Saya</a>
                {{--  TODO: linknya ke myRecipes  --}}
                <a href="{{ request()->is('myPreferences')? '':'myPreferences' }}" id="{{ request()->is('myPreferences')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Bahan yang Dihindari</a>
                <a href="{{ request()->is('myPassword')? '':'myPassword' }}" id="{{ request()->is('myPassword')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Perbarui Kata Sandi</a>
            </div>
        </div>

        @yield('profileContent')
    </div>
@endsection

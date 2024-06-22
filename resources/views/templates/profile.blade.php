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

            <div class="profileLinksPCContainer">
                <a href="{{ request()->is('myProfile')? '':'myProfile' }}" id="{{ request()->is('myProfile')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Data Profil</a>
                <a href="{{ request()->is('myPassword')? '':'myPassword' }}" id="{{ request()->is('myPassword')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Perbarui Kata Sandi</a>
                <a href="{{ request()->is('myRecipes')? '':'myRecipes' }}" id="{{ request()->is('myRecipes')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Resep Saya</a>
                <a href="{{ request()->is('myBookmarks')? '':'myBookmarks' }}" id="{{ request()->is('myBookmarks')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Markah Saya</a>
                <a href="{{ request()->is('myPreferences')? '':'myPreferences' }}" id="{{ request()->is('myPreferences')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Bahan yang Dihindari</a>
                <a href="{{ request()->is('myReviews')? '':'myReviews' }}" id="{{ request()->is('myReviews')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Ulasan Saya</a>
                <a href="{{ request()->is('myCookingHistory')? '':'myCookingHistory' }}" id="{{ request()->is('myCookingHistory')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Riwayat Memasak Saya</a>
            </div>
            
            <div class="profileLinksHPContainer" style="justify-content:space-between; overflow-y:scroll">
                <a href="{{ request()->is('myProfile')? '':'myProfile' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px" id="{{ request()->is('myProfile')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/profile_icon.png"  class="profileButtonIcon" alt="profile_icon" >
                    Data<br>
                    Profil
                </a>
                <a href="{{ request()->is('myPassword')? '':'myPassword' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px"  id="{{ request()->is('myPassword')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/password_icon.png" class="profileButtonIcon" alt="password_icon"  >
                    Ubah<br>
                    Sandi
                </a>
                <a href="{{ request()->is('myRecipes')? '':'myRecipes' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px"  id="{{ request()->is('myRecipes')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/dish_icon.png" class="profileButtonIcon" alt="recipe_icon"  >
                    Resep<br>
                    Saya
                </a>
                <a href="{{ request()->is('myBookmarks')? '':'myBookmarks' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px"  id="{{ request()->is('myBookmarks')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/bookmark_white.png" class="profileButtonIcon" alt="bookmark_icon"  >
                    Markah<br>
                    Saya
                </a>
                <a href="{{ request()->is('myPreferences')? '':'myPreferences' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px"  id="{{ request()->is('myPreferences')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/avoided_ingredient_icon.png" class="profileButtonIcon" alt="avoid_icon"  >
                    Hindari<br>
                    Bahan
                </a>
                <a href="{{ request()->is('myReviews')? '':'myReviews' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px"  id="{{ request()->is('myReviews')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/review_icon.png" class="profileButtonIcon" alt="review_icon"  >
                    Ulasan<br>
                    Saya
                </a>
                <a href="{{ request()->is('myCookingHistory')? '':'myCookingHistory' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px"  id="{{ request()->is('myCookingHistory')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/wok_icon.png" class="profileButtonIcon" alt="review_icon">
                    Riwayat<br>
                    Memasak
                </a>
                
            </div>
        </div>

        @yield('profileContent')
    </div>
@endsection

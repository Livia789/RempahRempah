@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile/profile.css') }}">
@endsection

@section('content')
    <div class="profileBodyContainer">
        <div class="profileContainer">
            <p style="font-size:30px"><b>Profil Saya</b></p>
            <form action="/editProfileImage" id="editProfileImageForm" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="file" name="img" id="img" onchange="handleImageUpload(this)" hidden>
                <div style="display:flex; flex-direction: column; position:relative;" class="profilePicture">
                    <img src="{{ asset($user->img) }}" alt="profile_picture" style="border-radius:50%; border:2px solid black; margin:auto; width:100%; height:auto;">
                    <div onclick="document.getElementById('img').click()" class="editProfilePictureBtn">
                        <img src="assets/icons/edit_icon.png" style="height:100%; width:100%">
                    </div>
                </div>
            </form>

            <div class="profileLinksPCContainer">
                <a href="{{ request()->is('myProfile')? '':'myProfile' }}" id="{{ request()->is('myProfile')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Data Profil</a>
                <a href="{{ request()->is('myPassword')? '':'myPassword' }}" id="{{ request()->is('myPassword')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Perbarui Kata Sandi</a>
                <a href="{{ request()->is('myRecipes')? '':'myRecipes' }}" id="{{ request()->is('myRecipes')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Resep Saya</a>
                <a href="{{ request()->is('myBookmarks')? '':'myBookmarks' }}" id="{{ request()->is('myBookmarks')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Markah Saya</a>
                <a href="{{ request()->is('myPreferences')? '':'myPreferences' }}" id="{{ request()->is('myPreferences')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Bahan yang Dihindari</a>
                <a href="{{ request()->is('myReviews')? '':'myReviews' }}" id="{{ request()->is('myReviews')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Ulasan Saya</a>
                <a href="{{ request()->is('myCookingProgress')? '':'myCookingProgress' }}" id="{{ request()->is('myCookingProgress')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Progres Memasak Saya</a>
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
                <a href="{{ request()->is('myCookingProgress')? '':'myCookingProgress' }}" class="profileLinkHpContainer" style="display:flex; flex-direction:column; padding:5px"  id="{{ request()->is('myCookingProgress')?'profileLinkHpselected':'' }}">
                    <img src="/assets/icons/cookHistory_icon.png" class="profileButtonIcon" alt="review_icon">
                    Progres<br>
                    Memasak
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

    <div class="modal fade" id="cropModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropModalLabel">Menyesuaikan gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cropContainer">
                        <img id="imgToCrop" src="">
                    </div>
                    <div class="buttons cropper">
                        <button class="sharpBox" id="zoom-out"><i class="fa fa-search-minus"></i></button>
                        <button class="sharpBox" id="zoom-in"><i class="fa fa-search-plus"></i></button>
                        <button class="sharpBox" id="rotate-left"><i class="fa fa-rotate-left"></i></button>
                        <button class="sharpBox" id="rotate-right"><i class="fa fa-rotate-right"></i></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary" onclick="submitCroppedProfileImg()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection

<script>
    let currentInput;
    let cropper;
    let file;

    function handleImageUpload(input) {
        file = input.files[0];

        const reader = new FileReader();
        reader.onload = function(e) {
            const image = document.getElementById('imgToCrop');
            image.src = e.target.result;
            currentInput = input;

            image.onload = function() {
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 1,
                    dragMode: 'move',
                    cropBoxResizable: false
                });
                $('#cropModal').modal('show');
            };
        };
        reader.readAsDataURL(file);
    }

    function submitCroppedProfileImg() {
        const canvas = cropper.getCroppedCanvas();
        canvas.toBlob(function(blob) {
            const dataTransfer = new DataTransfer();

            dataTransfer.items.add(new File([blob], file.name, {
                type: file.type
            }));
            currentInput.files = dataTransfer.files;
            $('#cropModal').modal('hide');
            
            let form = document.getElementById('editProfileImageForm');
            form.submit();
        }, file.type);
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('zoom-in').addEventListener('click', function() {
            cropper.zoom(0.1);
        });
        document.getElementById('zoom-out').addEventListener('click', function() {
            cropper.zoom(-0.1);
        });
        document.getElementById('rotate-left').addEventListener('click', function() {
            cropper.rotate(-90);
        });
        document.getElementById('rotate-right').addEventListener('click', function() {
            cropper.rotate(90);
        });
    });

</script>
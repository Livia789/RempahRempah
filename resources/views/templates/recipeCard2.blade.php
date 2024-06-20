<?php
    use Illuminate\Support\Str;
    $isBookmarked = Auth::user() && Auth::user()->bookmarks()->where('recipe_id', $recipe->id)->exists();
    $bookmarkImage = $isBookmarked ? 'bookmark_black.png' : 'bookmark_white.png';
?>

<a href="/recipeDetail/{{ $recipe->id }}" style="text-decoration: none; color:black;">
    @if($recipe->pivot && $recipe->pivot->created_at !== null)
        <p style="margin-bottom:0px">
            Dimasak {{$recipe->pivot->created_at->format('d M Y')}}
        </p>
    @endif
    <div class="recipeCardContainer">
        <div class="recipeCardImg" style="position: relative; margin-bottom:10px">
            <img src="{{ asset($recipe->img) }}" class="card-img-top" alt="recipe_image">
            @if ($recipe->company_id !== null)
                <img src="{{ asset($recipe->company()->first()->img_logo) }}" class="card-img-top companyLogo" alt="company logo">
            @endif
        </div>
        <div class="d-flex">
            {{-- <b style="flex:1; overflow-wrap:break-word;max-width:90%; width:90%">{{ Str::limit($recipe->name, 25) }}</b> --}}
            <b style="flex:1; overflow-wrap:break-word;max-width:90%; width:90%" class="limitTextRows">{{$recipe->name}}</b>
            @if(!Auth::user() || Auth::user()->role == 'member')    
                <img src="/assets/icons/{{$bookmarkImage}}"  class="picon bookmarkIcon" style="margin:0px;" id="recipeCardBookmarkButton" isBookmarked="{{$isBookmarked}}" onclick="recipeCard_toggleBookmark(event, this)" onmouseover="mousein_blackBookmarkIcon(this)" onmouseout="mouseout_whiteBookmarkIcon(this)" recipe_id="{{$recipe->id}}" alt="bookmark_icon">
            @endif
        </div>
        @include('templates/rating', ['rating_avg' => $recipe->reviews->avg('rating')])

        <div style="display:flex;" class="recipeCardUlasanInfoCtr">
            <img src="/assets/icons/empty_heart.png" class="picon" style="margin-right:5px;" alt="heart_icon">
            <p>
                {{ $recipe->reviews->count('rating') }} ulasan
            </p>
        </div>
        <div style="display:flex;" class="recipeCardUlasanInfoCtr">
            <img src="/assets/icons/time_icon.png" class="picon" style="margin-right:5px;" alt="time_icon">
            <p>
                {{ $recipe->getDurationStr() }}
            </p>
        </div>
        @if ($recipe->type == 'private')
            <h6 style="color: red; border: 1px red solid;" class="publicPrivateBubble">
                Privat
            </h6>
        @elseif (Auth::check() && $recipe->user_id == Auth::user()->id)
            <h6 style="color: green; border: 1px green solid;" class="publicPrivateBubble">
                Publik
            </h6>
        @endif
    </div>
</a>

<style>
    .recipeCardContainer {
        width: 250px;
        height: 390px;
        background-color: white;
        border-radius: 9px;
        border: 3px solid black;
        padding: 15px;
        margin:0px 20px 20px 0px;
    }

    .recipeCardImg {
        max-width: 100%;
        border-radius: 8px;
        border: 3px solid black;
    }

    .recipeCardContainer .starIcon {
        width: 20px;
        height: 20px;
    }

    .recipeCardContainer .ratingContainer {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .recipeCardContainer .companyLogo{
        position: absolute;
        bottom: 5px;
        right: 10px;
        width: 60px;
        height: auto;
        z-index: 1;
    }

    .recipeCardContainer p{
        margin: 0px;
    }

    .recipeCardContainer .publicPrivateBubble{
        width: 80px;
        text-align: center;
        border: 1px solid;
        border-radius: 16px;
        padding: 2px 5px;
        float: right;
    }

    .recipeCardUlasanInfoCtr{
        margin-bottom:10px;
    }

    .limitTextRows {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 18px;
        max-height: calc(18px * 2);
    }

    @media (max-width: 600px) {
        .recipeCardContainer {
            width: 40vw;
            height: 65vw;
            background-color: white;
            border-radius: 7px;
            border: 3px solid black;
            padding: 8px;
            margin:0px 10px 10px 0px;
        }

        .recipeCardContainer p, .recipeCardContainer b{
            font-size: 12px;
        }

        .recipeCardContainer .picon {
            width: 15px;
            height: 15px;
            margin: auto 0px;
        }

        .recipeCardContainer .starIcon {
            width: 12px;
            height: 12px;
        }

        .recipeCardContainer .bookmarkIcon{
            width: 20px;
            height: 20px;
        }

        .recipeCardContainer .publicPrivateBubble{
            width: 55px;
            text-align: center;
            border: 1px solid;
            border-radius: 16px;
            padding: 2px 2px;
            float: right;
            font-size: 8px;
        }

        .recipeCardContainer .ratingContainer{
            margin:5px 0px 0px 0px;
        }

        .recipeCardContainer .recipeCardUlasanInfoCtr{
            margin-bottom:2px;
        }

        .limitTextRows {
            line-height: 14px;
            max-height: calc(14px * 2);
        }

        .recipeCardContainer .companyLogo{
            position: absolute;
            bottom: 0px;
            right: 3px;
            width: 35px;
            height: auto;
            z-index: 1;
        }
    }


</style>

<script>
    var user_id = '{{Auth::user() ? Auth::user()->id : -1}}';
    var token = '{{csrf_token()}}';
    
    function mousein_blackBookmarkIcon(data){
        $(document).ready(function () {
            data.src = '/assets/icons/bookmark_black.png';
        });
    }

    function mouseout_whiteBookmarkIcon(data){
        $(document).ready(function () {
            console.log("on mouse quit, isBookmarked : " + data.getAttribute('isBookmarked'));
            let isBookmarked = data.getAttribute('isBookmarked');
            if(isBookmarked === true || isBookmarked === 'true' || isBookmarked === "1"){
                // alert("masuk condition isBookmarked")
                data.src = '/assets/icons/bookmark_black.png';
            }else{
                data.src = '/assets/icons/bookmark_white.png';
            }
        });
    }

    function recipeCard_toggleBookmark(event, data){
        event.preventDefault();
        let recipe_id = data.getAttribute('recipe_id');

        if(user_id == -1){
            alert("Mohon login untuk dapat menyimpan (markah) resep");
            return;
        }

        $.ajax({
            url: '/toggleBookmark',
            type: 'POST',
            data: {
                user_id: user_id,
                recipe_id: recipe_id,
                _token: token
            },
            success: function (response) {
                let isBookmarked = response.isBookmarked;
                let allBookmarkButtons = document.querySelectorAll(`img[id='recipeCardBookmarkButton'][recipe_id='${recipe_id}']`);
                allBookmarkButtons.forEach(bookmarkButton => {
                    bookmarkButton.setAttribute('isBookmarked', isBookmarked);
                    bookmarkButton.src = isBookmarked ? '/assets/icons/bookmark_black.png' : '/assets/icons/bookmark_white.png';
                });
            },
            error: function (e) {
                msg = e.status == 401 ? "[Error] Mohon login untuk dapat menyimpan resep" : "Gagal memproses permintaan simpan resep"
                alert(msg);
            }
        });
    }
</script>
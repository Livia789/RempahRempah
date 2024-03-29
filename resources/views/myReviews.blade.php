@extends('templates\template')

@section('css')

@endsection

@section('title', 'RempahRempah | Login')

@section('content')
<head>
    <style>
        .profileBodyContainer{
            padding:75px 25px;
            display:flex;
            flex-direction: row;
        }

        .profileBodyContainer a, a:hover{
            text-decoration: none;
            color:black;
        }

        .profilePicture{
            width:40%;
            height:auto;
            margin:10px;
        }

        .profileContainer{
            width:25%;
            text-align: center;
        }

        .sharpBox{
            border:3px solid black;
            color:black;
            display:inline-box;
            padding:10px 15px;
            border-radius:5px;
            width:fit-content;
            background-color:white;
            display:flex;
            justify-content: center;
            margin:20px 0px;
        }

        .sharpBox:hover{
            background-color:rgb(175, 175, 175);
        }

        #sharpBoxSelected{
            background-color:black;
            color:white;
        }

        .picon{
            height:25px;
            width:auto;
            margin-right:10px;
        }

        .content{
            padding:0px;
            margin:0px;
            background-color:#EFEFEF;
        }

        .halfWidth{
            width:50%;
        }

        {{--  my review  --}}

        .profileContentContainer{
            width:75%;
            display:flex;
            flex-wrap:wrap;
            justify-content:left;
        }

        .reviewCardContainer{
            background-color:white;
            border:3px solid black;
            color:black;
            border-radius:7px;
            width:45%;
            padding:20px;
            display:flex;
            flex-direction: row;
            justify-content: space-between;
            margin:20px;
        }

        .recipeImg{
            width:100%;
            height:auto;
            border-radius:7px;
            border:2px solid black;
        }

        .reviewImg{
            width:80%;
            height:auto;
            margin: 0px auto;
            border-radius:7px;
            border:2px solid black;
        }

        .cardDivider {
            border-left: 3px solid black;
        }

        .reviewCardTitle{
            font-size:18px;
            margin:10px 0px;
            font-weight: bold;
        }


    </style>
</head>
<div class="profileBodyContainer">
    <div class="profileContainer">
        <p style="font-size:30px"><b>Foto Profil</b></p>
        <img src="{{ $user->profile_img }}" class="profilePicture" alt="profile_picture">


        <a href="#" class="sharpBox mx-auto mb-5">
            <img src="assets/icons/edit_icon.png" class="picon" alt="edit_icon">
            Edit Profil
        </a>

        {{--  //TODO: cek  --}}
        <a href="#" id="{{ request()->is('profile')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Data Profil</a>
        <a href="#" id="{{ request()->is('myReviews')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Ulasan Saya</a>
        <a href="{{ request()->is('myRecipes')? '':'temp/myRecipes' }}" class="sharpBox mx-auto halfWidth">Resep Saya</a>
        <a href="#" id="{{ request()->is('avoidedIngredients')?'sharpBoxSelected':'' }}" class="sharpBox mx-auto halfWidth">Bahan yang Dihindari</a>

    </div>

    <div class="profileContentContainer">
        @foreach($reviews as $review)
            <?php $recipe = $review->recipe ?>
            {{--  //TODO: link ke page recipeDetail yg baru nanti kl udah ada --}}
            <a href="/temp/recipeDetail/{{ $recipe->id }}" class="reviewCardContainer">
                <div style="width:40%">
                    <img src="{{ $review->recipe->img }}" class="recipeImg" alt="recipe img">
                    <p class="reviewCardTitle"><b>{{ $review->recipe->name }}</b></p>
                    <div class="d-flex align-items-center">
                        <p><b>Resep oleh</b></p>
                        {{--  //TODO: link ke page profile orang (?) tp blm ada design + blm bahas mau tampilin apa aja & gmn (bs private akun/gmn dll) --}}
                        {{--  //pak bos tolong bantu saya bikin design buat link ke profile orang  --}}
                        <p class="roundedBox black ms-3">{{ "@".$review->recipe->creator->name }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="/assets/icons/time_icon.png" class="picon" alt="time_icon">
                        <p style="margin:auto 0px">{{ $review->recipe->getDurationStr() }}</p>
                    </div>
                </div>
                <div class="cardDivider"></div>
                <div style="width:40%">
                    <p class="reviewCardTitle">Ulasan Saya</p>
                    <img src="{{ $review->recipe->img }}" class="reviewImg" alt="recipe img">

                    <p class="rating mt-3">
                        @php
                            $rating_avg = $review->recipe->reviews->avg('rating');
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $rating_avg)
                                <i class="fa fa-star"></i>
                            @elseif ($i - $rating_avg >= 0.5 && $i - $rating_avg < 1)
                                <i class="fa fa-star-half-empty"></i>
                            @else
                                <i class="fa fa-star-o"></i>
                            @endif
                        @endfor
                        {{ number_format($rating_avg, 2) }}
                    </p>
                    <p>{{$review->comment}}</p>

                </div>
            </a>
        @endforeach
    </div>

</div>
@endsection

@extends('templates\template')

@section('css')

@endsection

@section('title', 'RempahRempah | Login')

@section('content')
<head>
    <style>
        .profileBodyContainer{
            padding:75px 0px;
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
            border:2px solid black;
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

        .picon{
            height:25px;
            width:auto;
            margin-right:10px;
        }

        .profileCenter{
            margin-left:auto;
            margin-right:auto;
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
            width:70%;
            background-color:rgb(131, 131, 131);
        }

        .reviewCardContainer{
            background-color:white;
            border:2px solid black;
            color:black;
            border-radius:7px;
            width:25%;
            padding:20px;
            display:flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .recipeImg{
            width:100%;
            height:auto;
        }

        .reviewImg{
            width:80%;
            height:auto;
            margin: 0px auto;
        }

        .cardDivider {
            border-left: 2px solid black;
        }

        .blackBorderText{
            color:black;
            border-color:black;
        }

        .roundedBox{
            padding: 5px 10px;
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

        <div class="sharpBox profileCenter">
            <img src="assets/icons/edit_icon.png" class="picon" alt="edit_icon">
            <a href="" >Edit Profil</a>
        </div>
        <br>
        <div class="sharpBox profileCenter">
            <a href="" >Data Profil</a>
        </div>
        <div class="sharpBox profileCenter halfWidth">
            <a href="">Ulasan Saya</a>
        </div>
        <div class="sharpBox profileCenter halfWidth">
            <a href="" >Resep Saya</a>
        </div>
        <div class="sharpBox profileCenter halfWidth">
            <a href="" >Bahan yang Dihindari</a>
        </div>
    </div>

    <div class="profileContentContainer">
        @foreach($reviews as $review)
            <?php $recipe = $review->recipe ?>
            <div class="reviewCardContainer">
                <div style="width:40%">
                    <img src="{{ $review->recipe->img }}" class="recipeImg" alt="recipe img">
                    <p class="reviewCardTitle"><b>{{ $review->recipe->name }}</b></p>
                    <div class="d-flex align-items-center">
                        <p><b>Resep oleh</b></p>
                        <p class="roundedBox blackBorderText ms-3">{{ "@".$review->recipe->creator->name }}</p>
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
                    <p>{{$review->comment}}</p>

                    <p class="rating">
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

                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection

@extends('templates/profile')

@section('title', 'RempahRempah | My Reviews')

<link rel="stylesheet" href="{{ asset('css/profile/myReviews.css') }}">

@section('profileContent')
    <div class="profileContentContainer">
        @foreach($reviews as $review)
            <?php $recipe = $review->recipe ?>
            {{--  //TODO: link ke page recipeDetail yg baru nanti kl udah ada --}}
            <a href="/temp/recipeDetail/{{ $recipe->id }}" class="reviewCardContainer">
                <div class="cardContent">
                    <img src="{{ asset($review->recipe->img) }}" class="recipeImg" alt="recipe img">
                    <p class="reviewCardTitle"><b>{{ $review->recipe->name }}</b></p>
                    <div class="d-flex align-items-center">
                        <p><b>Resep oleh</b></p>
                        {{--  //TODO: link ke page profile orang (?) tp blm ada design + blm bahas mau tampilin apa aja & gmn (bs private akun/gmn dll) --}}
                        {{--  //pak bos tolong bantu saya bikin design buat link ke profile orang  --}}
                        <p class="roundedBox whiteBackground ms-3">{{ "@".$review->recipe->creator->name }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="/assets/icons/time_icon.png" class="picon" alt="time_icon">
                        <p style="margin:auto 0px">{{ $review->recipe->getDurationStr() }}</p>
                    </div>
                </div>
                <div class="cardDivider"></div>
                <div class="cardContent">
                    <p class="reviewCardTitle">Ulasan Saya</p>

                    <img src="{{ asset($review->recipe->img) }}" class="reviewImg" alt="recipe img">

                    {{-- ada bagusnya taro tgl dia post reviewnya jg ga sih di cardnya --}}
                    @include('templates/rating', ['rating_avg' => $review->recipe->reviews->avg('rating')])

                    {{--  <p class="rating mt-3">
                        @php
                            $rating_avg = $review->recipe->reviews->avg('rating');
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $rating_avg)
                                <img src="/assets/icons/full_star.png" class="starIcon" alt="star_icon">
                            @elseif ($i - $rating_avg >= 0.5 && $i - $rating_avg < 1)
                                <i class="fa fa-star-half-empty"></i>
                            @else
                                <img src="/assets/icons/empty_star.png" class="starIcon" alt="star_icon">
                            @endif
                        @endfor
                        {{ number_format($rating_avg, 2) }}
                    </p>  --}}
                    <p>{{$review->comment}}</p>

                </div>
            </a>
        @endforeach
    </div>
@endsection

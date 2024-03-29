@extends('templates/profile')

@section('title', 'RempahRempah | My Reviews')

@section('profileContent')
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
@endsection

<a href="/recipeDetail/{{$recipe->id}}">
    <div class="card h-100 recipeCard">
        @if (isset($isNeedDue))
            <h5 style="margin-top: 5px; margin-bottom: 15px;">
                @php
                    $days = $recipe->updated_at->addDays(7)->diffInDays(now(), false);
                    if ($days < 0) {
                        $text = 'Tenggat waktu dalam '.abs($days).' hari';
                    } else {
                        $text = 'Melewati tenggat waktu '.$days.' hari';
                    }
                @endphp
                {{$text}}
            </h5>
        @endif
        <img src="{{ asset($recipe->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$recipe->name}}</h5>
            <p class="card-text">
                <p class="recipeAttributes rating">
                    @include('templates/rating', ['rating_avg' => $recipe->reviews->avg('rating')])
                </p>
                @if (isset($isNeedProcessTrack))
                    <p class="recipeAttributes verificationStatus">
                        Tahap verifikasi {{(($recipe->is_verified_by_admin ? 1 : 0) + ($recipe->is_verified_by_ahli_gizi ? 1 : 0)) * 50}}%
                    </p>
                @endif
                <p class="recipeAttributes reviews">
                    <i class="fa fa-heart"></i>
                    &ensp; {{$recipe->reviews->count('rating')}} ulasan
                </p>
                <p class="recipeAttributes duration">
                    <i class="fa fa-clock-o"></i>
                    &ensp; {{$recipe->getDurationStr()}}
                </p>
            </p>
        </div>
    </div>
</a>

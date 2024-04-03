<a href="/temp/recipeDetail/{{$recipe->id}}">
    <div class="card h-100 recipeCard">
        <img src="{{ asset($recipe->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$recipe->name}}</h5>
            <p class="card-text">
                <p class="recipeAttributes rating">
                    @include('templates/rating', ['rating_avg' => $recipe->reviews->avg('rating')])
                </p>
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

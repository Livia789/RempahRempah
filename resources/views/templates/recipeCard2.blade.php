<a href="/recipeDetail/{{ $recipe->id }}" style="text-decoration: none; color:black;">

    <div class="recipeCardContainer">
        <div class="recipeCardImg" style="position: relative;">
            <img src="{{ asset($recipe->img) }}" class="card-img-top" alt="...">
            @if ($recipe->company_id !== null)
                <img src="{{ asset($recipe->company()->first()->img_logo) }}" class="card-img-top companyLogo" alt="company logo">
            @endif
        </div>
        <b>{{ $recipe->name }}</b>
        @include('templates/rating', ['rating_avg' => $recipe->reviews->avg('rating')])

        <div style="display:flex; margin-bottom:10px">
            <img src="/assets/icons/empty_heart.png" class="picon" style="margin-right:5px;" alt="heart_icon">
            {{ $recipe->reviews->count('rating') }} ulasan
        </div>
        <div style="display:flex;">
            <img src="/assets/icons/time_icon.png" class="picon" alt="time_icon">
            {{ $recipe->getDurationStr() }}
        </div>
    </div>

</a>

<style>
    .recipeCardContainer {
        width: 250px;
        height: 350px;
        background-color: white;
        border-radius: 7px;
        border: 3px solid black;
        padding: 15px;
        margin:0px 20px 10px 0px;
    }

    .recipeCardImg {
        max-width: 100%;
        border-radius: 5px;
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
</style>

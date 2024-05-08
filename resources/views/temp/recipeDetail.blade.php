@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Login')

@section('content')
<div>
    <button style="margin:20px; padding:5px 10px">
        <a href="/myReviews" style="color:black;">ulasan saya</a>
    </button>
    <button style="margin:20px; padding:5px 10px">
        <a href="/temp/avoidedIngredients" style="color:black;">bahan yang dihindari</a>
    </button>
    <button style="margin:20px; padding:5px 10px">
        <a href="/temp/myRecipes" style="color:black;">resep saya</a>
    </button>
    <h1>Recipe Detail : {{ $recipe->recipe_name }}</h1>

    <br><br><br>

    <h1>TOOLSNYA</h1>
    <p>
        @foreach($recipe->tools as $tool)
            <p>{{$loop->iteration.' . '. $tool->name }}</p>
        @endforeach
    </p>

    <br><br><br>
    <h1>NUTRISINYA</h1>
    @foreach($recipe->nutrition as $nutrition)
        <p>{{ $nutrition->name.' : '.$nutrition->pivot->quantity.' '.$nutrition->pivot->unit }}</p>
    @endforeach

    <br><br><br>
    <h1>INGREDIENTSNYA</h1>
    @foreach($recipe->ingredientHeaders as $ingredientHeader)
        <h4>{{ $ingredientHeader->name }}</h4>

        @foreach($ingredientHeader->ingredients as $ingredient)
            <p>
                {{ $loop->iteration.' . '.$ingredient->name }}
                {{ $ingredient->pivot->quantity.' '.$ingredient->pivot->unit }}
            </p>
        @endforeach
    @endforeach

    <br><br><br>
    <h1>STEPSNYA</h1>
    @foreach($recipe->stepHeaders as $stepHeader)
        <h4>{{ $stepHeader->name }}</h1

        @if($stepHeader->steps->count() > 0)
            @foreach($stepHeader->steps as $step)
                <p>{{$loop->iteration.' . '. $step->step_desc }}</p>
            @endforeach
        @else
            <p>ga ada langkah (ini harusnya insert dari db. kalo create resep pake form harusnya langkah required.)</p>
        @endif
    @endforeach

    <br><br><br>
    <h1>TAGS RECIPE INI</h1>
    @foreach($recipe->tags as $tag)
        <p>
            {{ $loop->iteration.'. ' .$tag->name }}
        </p>
    @endforeach

    <br><br><br>
    <h1>REVIEWS RECIPE INI</h1>
    @foreach($recipe->reviews as $reviews)
        {{$reviews->user->name}}
        {{$reviews->rating}}
        <p>
            {{ $loop->iteration.'. ' .$reviews->comment}}
        </p>
    @endforeach
</div>
@endsection

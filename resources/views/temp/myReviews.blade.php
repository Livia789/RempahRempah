@extends('templates\template')

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
    <h1>current user : {{ $user->name }}</h1>
    <br><br>

    @foreach($myReviews as $review)
        <h3>{{$review->recipe->recipe_name}}</h1>
        <p>recipe creator : {{ $review->recipe->creator->name }}</p>
        <p>durasi memasak : {{ $review->recipe->recipe_time }} menit</p>
        <p>comment : {{ $review->comment }}</p>
        <p>rating : {{ $review->rating }}</p>
        <br>
    @endforeach
</div>
@endsection

@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Login')



@section('content')
<div>
    <button style="margin:20px; padding:5px 10px">
        <a href="/temp/myReviews" style="color:black;">ulasan saya</a>
    </button>
    <button style="margin:20px; padding:5px 10px">
        <a href="/temp/avoidedIngredients" style="color:black;">bahan yang dihindari</a>
    </button>
    <button style="margin:20px; padding:5px 10px">
        <a href="/temp/myRecipes" style="color:black;">resep saya</a>
    </button>
    <h1>current user : {{ $user->name }}</h1>
    <br><br>
    <h1>Bookmarks : </h1>

    @foreach($bookmarks as $bookmark)
        <h3>{{$bookmark->recipe->recipe_name}}</h1>
        <p>recipe creator : {{ $bookmark->recipe->creator->name }}</p>
        <p>recipe cook time : {{ $bookmark->recipe->recipe_time }}</p>
    @endforeach
</div>
@endsection

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

    @foreach($myRecipes as $myRecipe)
        <h1>{{$myRecipe->recipe_name}}</h1>
        <button style="margin:20px; padding:5px 10px">
            <a href="/temp/recipeDetail/{{ $myRecipe->id }}" style="color:black;">lihat detail resep</a>
        </button>
        <p>{{ $myRecipe->recipe_description }}</p>
        <p>
            @if(!$myRecipe->admin)
                <p>Admin : Belum ada admin</p>
            @else
                <p>Admin : {{ $myRecipe->admin->name }}</p>
            @endif
        </p>
        <p>
            @if(!$myRecipe->daerah)
                <p>daerah : Belum ada daerah</p>
            @else
                <p>daerah : {{ $myRecipe->daerah->name }}</p>
            @endif
        </p>
        <p>
            @if(!$myRecipe->specialOccasion)
                <p>masakan (event) : Belum ada</p>
            @else
                <p>masakan (event) : {{ $myRecipe->specialOccasion->name  }}</p>
            @endif
        </p>
        <p>kategori : {{ $myRecipe->category->name }}</p>
    @endforeach
</div>
@endsection

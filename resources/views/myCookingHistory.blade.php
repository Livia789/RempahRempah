@extends('templates/profile')

@section('title', 'Rempah Rempah | Resep Saya')

<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('profileContent')
    <div class="container px-5">
        <h1>Riwayat Memasak</h1>
        <br><br>
        <div class="d-flex flex-wrap">
            @foreach($recipes as $recipe)
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>
@endsection

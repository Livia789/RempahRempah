@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection

@section('title', 'RempahRempah | Home')

@section('content')
    @if (session('successMessage'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('successMessage') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('accessDenied'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('accessDenied') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="homePageContainer">

        <div style="padding-right:60px">
            <div class="exclusiveMenuContainer">
                <div class="d-flex">
                    <h4 style="color:white">Menu Spesial oleh</h4>
                    <img src="{{ asset($company->img_logo) }}"
                        style="height:30px; width:auto; margin:auto 10px;" alt="RempahRempah Logo">
                </div>
                <img src="{{ asset($company->img_banner) }}" style="min-height:300px; border-radius:5px; width:100%; max-height:150px; margin:15px 0px; object-fit:cover" alt="exclusive_recipe_banner">
                <div class="d-flex" style="margin:10px 0px; overflow-y:scroll">
                    @foreach ($company->recipes as $recipe)
                        @include('templates/recipeCard2', compact('recipe'))
                    @endforeach
                </div>
            </div>
        </div>

        <h1>Rekomendasi</h1>

        <div class="d-flex" style="margin:10px 0px; overflow-y:scroll">
            @foreach ($topRatedRecipes as $recipe)
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>

        <h1>Masak Kilat</h1>

        <div class="d-flex" style="margin:10px 0px; overflow-y:scroll">
            @foreach ($fastRecipes as $recipe)
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>

@endsection

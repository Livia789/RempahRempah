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

        <div class="exclusiveMenuContainerContainer">
            <div class="exclusiveMenuContainer">
                <div class="d-flex">
                    <h2 style="color:white">Menu Spesial oleh</h2>
                    <img src="{{ asset($company->img_logo) }}" style="height:30px; width:auto; margin:auto 10px;"
                        alt="RempahRempah Logo">
                </div>
                <img src="{{ asset($company->img_banner) }}" class="companyBanner" alt="exclusive_recipe_banner">
                <div class="d-flex" style="margin:10px 0px; overflow-x:scroll">
                    @foreach ($company->recipes as $recipe)
                        @include('templates/recipeCard2', compact('recipe'))
                    @endforeach
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center mb-2">
            <h2 class="sectionTitle" style="margin-right:20px">Rekomendasi</h2>
            <b><a href="/search" class="homeSeeMoreBtn">Lihat lainnya</a></b>
        </div>

        <div class="d-flex mb-4" style="margin:0px; overflow-x:scroll">
            <div class="ganjelan"></div>
            @foreach ($topRatedRecipes as $recipe)
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>

        <div class="d-flex align-items-center mb-2">
            <h2 class="sectionTitle" style="margin-right:20px">Masak Kilat</h2>
            <b><a href="/search?duration=30" class="homeSeeMoreBtn">Lihat lainnya</a></b>
        </div>
        <div class="d-flex" style="margin:0px; overflow-x:scroll">
            <div class="ganjelan"></div>
            @foreach ($fastRecipes as $recipe)
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>

@endsection

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
        <div class="exclusiveMenuContainer">
            <div class="d-flex">
                <h4 style="color:white">Menu Spesial oleh</h4>
                {{-- //TODO: ganti jadi logo perusahaan --}}
                <img src="{{ asset('assets/logo_rempah_fit.png') }}" style="height:30px; width:auto; margin:auto 10px;" alt="RempahRempah Logo">
            </div>
            <img src="{{ asset('assets/banner_example.png') }}" style="min-height:300px; border-radius:5px; width:100%; max-height:150px; margin:15px 0px; object-fit:cover" alt="exclusive_recipe_banner">
        </div>

        <h1>Rekomendasi</h1>

        @foreach($allRecipes as $recipe)
            {{$recipe->name}}
            <br>
        @endforeach
    </div>

@endsection

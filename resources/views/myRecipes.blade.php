@extends('templates/profile')

@section('title', 'Rempah Rempah | Resep Saya')

<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('profileContent')
    <div class="container px-5">
        <h1>Resep Saya</h1>
        <div class="col-md-9">
            <h3 class="sectionDivider">Publik</h3>
            @php
                $isNeedProcessTrack = true;
            @endphp
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @forelse ($recipes as $recipe)
                    @if ($recipe->type == 'public')
                        <div class="col">
                            @include('templates/recipeCard', compact('recipe'))
                        </div>
                    @endif
                @empty
                    <h6 class="emptySearch">Belum ada resep yang sesuai.</h6>
                @endforelse
            </div>
            <h3 class="sectionDivider">Privat</h3>
            @php
                $isNeedProcessTrack = false;
            @endphp
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @forelse ($recipes as $recipe)
                    @if ($recipe->type == 'private')
                        <div class="col">
                            @include('templates/recipeCard', compact('recipe'))
                        </div>
                    @endif
                @empty
                    <h6 class="emptySearch">Belum ada resep yang sesuai.</h6>
                @endforelse
            </div>
        </div>
    </div>
@endsection

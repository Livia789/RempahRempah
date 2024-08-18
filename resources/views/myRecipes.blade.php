@extends('templates/profile')

@section('title', 'Rempah Rempah | Resep Saya')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('profileContent')
    <div class="">
        <h1>Resep Saya</h1>
        <h3 class="sectionDivider">Publik</h3>
        @php
            $isNeedProcessTrack = true;
        @endphp
        {{-- <div class="row row-cols-1 row-cols-md-3 g-3"> --}}
        <div class="d-flex flex-wrap" style="width:100%;">
            @forelse ($recipes_public as $recipe)
                @if ($recipe->type == 'public')
                    {{-- <div class="col"> --}}
                        @include('templates/recipeCard2', compact('recipe'))
                    {{-- </div> --}}
                @endif
            @empty
                <i class="emptySearch">Belum ada resep yang sesuai</i>
            @endforelse
        </div>
        <h3 class="sectionDivider">Privat</h3>
        @php
            $isNeedProcessTrack = false;
        @endphp
        {{-- <div class="row row-cols-1 row-cols-md-3 g-3"> --}}
        <div class="d-flex flex-wrap" style="width:100%;">
            @forelse ($recipes_private as $recipe)
                @if ($recipe->type == 'private')
                    {{-- <div class="col"> --}}
                        @include('templates/recipeCard2', compact('recipe'))
                    {{-- </div> --}}
                @endif
            @empty
                <i class="emptySearch">Belum ada resep yang sesuai</i>
            @endforelse
        </div>
    </div>
@endsection

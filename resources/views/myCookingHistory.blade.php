@extends('templates/profile')

@section('title', 'Rempah Rempah | Resep Saya')

<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('profileContent')
    <div class="container px-5">
        <h1>Riwayat Memasak</h1>
        <br><br>
        <div class="col-md-9">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @forelse ($recipes as $recipe)
                    {{-- {{$loop->iteration.'.'.$recipe->pivot->created_at}} --}}
                    <div class="col">
                        @include('templates/recipeCard', compact('recipe'))
                    </div>
                @empty
                    <div style="width:100%">
                        <i>Kamu belum memiliki riwayat memasak. Mari temukan resep untuk dimasak hari ini!</i>
                        <div class="sharpBox btnSearchRecipe">
                            <a href="/search" style="text-decoration: none; color:black">
                                Temukan Resep
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@extends('templates/profile')

@section('title', 'Rempah Rempah | Riwayat Memasak Saya')

@section('profileContent')
    <div class="">
        <h1>Riwayat Memasak</h1>

        @if($recipes->isEmpty())
            <div>
                <div style="text-align:center">
                    <i>Saat ini belum ada riwayat memasak</i>
                </div>
                <div class="sharpBox btnSearchRecipe">
                    <a href="/search" style="text-decoration: none; color:black">
                        Temukan Resep
                    </a>
                </div>
            </div>
        @endif

        <div class="d-flex flex-wrap" style="width:100%;">
            @foreach($recipes as $recipe)
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>
@endsection

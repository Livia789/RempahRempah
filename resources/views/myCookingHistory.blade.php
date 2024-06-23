@extends('templates/profile')

@section('title', 'Rempah Rempah | Riwayat Memasak Saya')

@section('profileContent')
    <div class="">
        <h1>Riwayat Memasak</h1>

        <div class="d-flex flex-wrap" style="width:100%;">
            @foreach($recipes as $recipe)
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>
@endsection

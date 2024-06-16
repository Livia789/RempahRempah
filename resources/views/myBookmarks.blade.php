@extends('templates/profile')

@section('title', 'Rempah Rempah | Markah Saya')

<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

@section('profileContent')
    <div class="container px-5">
        <h1>Markah Saya</h1>

        <div class="d-flex flex-wrap">
            @foreach($user->bookmarks as $bookmark)
                <?php $recipe = $bookmark->recipe; ?>
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>
@endsection

@extends('templates/profile')

@section('title', 'Rempah Rempah | Markah Saya')

@section('profileContent')
    <div class="">
        <h1>Markah Saya</h1>

        <div class="d-flex flex-wrap" style="width:100%;">
            @foreach($user->bookmarks as $bookmark)
                <?php $recipe = $bookmark->recipe; ?>
                @include('templates/recipeCard2', compact('recipe'))
            @endforeach
        </div>
    </div>
@endsection

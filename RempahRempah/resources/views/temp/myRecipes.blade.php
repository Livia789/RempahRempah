@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Login')



@section('content')
<div>
    <h1>current user : {{ $user->name }}</h1>

    @foreach($myRecipes as $myRecipe)
        <h1>{{$myRecipe->recipe_name}}</h1>
        <p>{{ $myRecipe->recipe_description }}</p>
        <p>
            @if(!$myRecipe->admin)
                <p>Admin : Belum ada admin</p>
            @else
                <p>Admin : {{ $myRecipe->admin->name }}</p>
            @endif
        </p>
        <p>
            @if(!$myRecipe->daerah)
                <p>daerah : Belum ada daerah</p>
            @else
                <p>daerah : {{ $myRecipe->daerah->name }}</p>
            @endif
        </p>
        <p>
            @if(!$myRecipe->specialOccasion)
                <p>daerah : Belum ada daerah</p>
            @else
                <p>daerah : {{ $myRecipe->specialOccasion  }}</p>
            @endif
        </p>
    @endforeach
</div>
@endsection

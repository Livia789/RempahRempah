@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Login')

@section('content')
<div>
    <h1>current user : {{ $user->name }}</h1>

    @foreach($avoidedIngredients as $avoidedIngredient)
        <h1>{{$avoidedIngredient->ingredient_name}}</h1>
    @endforeach
</div>
@endsection

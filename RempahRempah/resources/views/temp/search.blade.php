@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Login')

@section('content')
<div>
    <br><br><br>
    <h1>RECIPES ini coba by ingredients</h1>
    @foreach($recipes as $recipe)
        <p>
            {{ $loop->iteration.'. ' .$recipe->name }}
        </p>
    @endforeach
</div>
@endsection

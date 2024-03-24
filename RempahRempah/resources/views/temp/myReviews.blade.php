@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('title', 'RempahRempah | Login')



@section('content')
<div>
    <h1>current user : {{ $user->name }}</h1>
    <br><br>

    @foreach($myReviews as $review)
        <h3>{{$review->recipe->recipe_name}}</h1>
        <p>recipe creator : {{ $review->recipe->user->name }}</p>
        <p>durasi memasak : {{ $review->recipe->recipe_time }} menit</p>
        <p>comment : {{ $review->comment }}</p>
        <p>rating : {{ $review->rating }}</p>
        <br>
    @endforeach
</div>
@endsection

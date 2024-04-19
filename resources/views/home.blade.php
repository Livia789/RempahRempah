@extends('templates\template')

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('css/index.css') }}"> --}}
@endsection

@section('title', 'RempahRempah | Home')

@section('content')
test
    @if (session('loginSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('loginSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('accessDenied'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('accessDenied') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endsection

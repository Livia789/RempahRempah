@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

@section('title', 'RempahRempah | Verifikasi resep')

@section('content')
    <style>
        .content {
            padding: 20px 60px !important;
        }
    </style>
    @php
        $isNeedDue = true;
        $isNeedProcessTrack = true;
        if (Auth::user()->role == 'admin') {
            $title_1 = "Perlu diverifikasi";
            $title_2 = "Riwayat verifikasi";
        } else {
            $title_1 = "Nilai gizi perlu diisi";
            $title_2 = "Riwayat nilai gizi";
        }
    @endphp
    <div class="section">
        <div class="recipeSection">
            <h3 class="sectionDivider">{{$title_1}}</h3>
            <div class="row row-cols-1 row-cols-md-4 g-3">
                @forelse ($availableRecipes as $recipe)
                    <div class="col">
                        @include('templates/recipeCard', compact('recipe', 'isNeedDue', 'isNeedProcessTrack'))
                    </div>
                @empty
                    <h6 class="emptySearch">Belum ada resep yang sesuai.</h6>
                @endforelse
                @php
                    unset($isNeedDue);
                @endphp
            </div>
        </div>
        <ul class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{$availableRecipes->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $availableRecipes->lastPage() && $i <= 10; $i++)
                <li class="page-item">
                    @if ($i == $availableRecipes->currentPage())
                        <b><a class="page-link" href="{{$availableRecipes->url($i)}}">{{$i}}</a></b>
                    @else
                        <a class="page-link" href="{{$availableRecipes->url($i)}}">{{$i}}</a>
                    @endif
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{$availableRecipes->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="section">
        <div class="recipeSection">
            <h3 class="sectionDivider">{{$title_2}}</h3>
            <div class="row row-cols-1 row-cols-md-4 g-3">
                @forelse ($doneRecipes as $recipe)
                    <div class="col">
                        @include('templates/recipeCard', compact('recipe', 'isNeedProcessTrack'))
                    </div>
                @empty
                    <h6 class="emptySearch">Belum ada resep yang sesuai.</h6>
                @endforelse
            </div>
        </div>
        <ul class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{$doneRecipes->previousPageUrl()}}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $doneRecipes->lastPage() && $i <= 10; $i++)
                <li class="page-item">
                    @if ($i == $doneRecipes->currentPage())
                        <b><a class="page-link" href="{{$doneRecipes->url($i)}}">{{$i}}</a></b>
                    @else
                        <a class="page-link" href="{{$doneRecipes->url($i)}}">{{$i}}</a>
                    @endif
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{$doneRecipes->nextPageUrl()}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
@endsection
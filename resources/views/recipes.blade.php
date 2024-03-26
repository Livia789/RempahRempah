@extends('templates\template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
@endsection

@section('title', 'RempahRempah | Recipes')

@section('content')
    <div class="row row-cols-2 row-cols-md-5 g-3">
        @forelse ($recipes as $recipe)
            <div class="col">
                <a href="/temp/recipeDetail/{{$recipe->id}}">
                    <div class="card h-100">
                        <img src="{{ Storage::url($recipe->img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            {{-- love img, ulasan
                            time, duration --}}
                            <h5 class="card-title">{{$recipe->name}}</h5>
                            <p class="card-text">
                                <p class="recipeAttributes rating">
                                    @php
                                        $rating_avg = $recipe->reviews->avg('rating');
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rating_avg)
                                            <i class="fa fa-star"></i>
                                        @elseif ($i - $rating_avg >= 0.5 && $i - $rating_avg < 1)
                                            <i class="fa fa-star-half-empty"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                    {{ number_format($rating_avg, 2) }}
                                </p>
                                <p class="recipeAttributes reviews">
                                    <i class="fa fa-heart"></i>
                                    {{$recipe->reviews->count('rating')}} ulasan
                                </p>
                                <p class="recipeAttributes duration">
                                    <i class="fa fa-clock-o"></i>
                                    {{$recipe->duration}} menit
                                </p>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            No recipes yet.
        @endforelse
    </div>
    {{-- <ul class="pagination d-flex justify-content-center">
        <li class="page-item">
            <a class="page-link" href="{{$recipes->previousPageUrl()}}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{$recipes->nextPageUrl()}}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul> --}}
@endsection

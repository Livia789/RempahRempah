@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

@section('title', 'Rempah Rempah | Resep')

@section('content')
    @php
        $index = -1;
        $unique_ctg_groups = $category_all->unique('class');
    @endphp
    <div class="row">
        <div class="col-md-3">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                @foreach ($unique_ctg_groups as $unique_ctg_group)
                    @php
                        $index++;
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen--category{{$index}}" aria-expanded="true" aria-controls="panelsStayOpen--category{{$index}}">
                                {{$unique_ctg_group->class}}
                            </button>
                        </h2>
                        <div id="panelsStayOpen--category{{$index}}" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                @foreach ($category_all as $ctg)
                                    @if ($ctg->class == $unique_ctg_group->class)
                                        <a class="dropdown-item text-wrap" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, $index, $ctg->id, $durations, null, $tags, null, $filterBy)}}">
                                            <input type="checkbox" name="category_{{$ctg->id}}" id="category_{{$ctg->id}}" {{isset($categoryGroups[$index]) && in_array($ctg->id, $categoryGroups[$index]) ? "checked" : "" }} class="whiteBackground"onclick="location.href='/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, $index, $ctg->id, $durations, null, $tags, null, $filterBy)}}';">
                                            {{$ctg->name}}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Durasi
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            @foreach ($duration_minutes as $minutes)
                                <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, $minutes, $tags, null, $filterBy)}}">
                                    <input type="checkbox" name="duration_{{$minutes}}" id="duration_{{$minutes}}" {{in_array($minutes, $durations) ? " checked" : "" }} class="whiteBackground" onclick="location.href='/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, $minutes, $tags, null, $filterBy)}}';">
                                    &le;{{$minutes}} menit
                                </a>
                            @endforeach
                            <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, -1, $tags, null, $filterBy)}}">
                                <input type="checkbox" name="duration_lainnya" id="duration_lainnya" {{in_array(-1, $durations) ? " checked" : "" }} class="whiteBackground">
                                Lainnya
                            </a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Tag
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            @foreach ($tag_all as $tag)
                                <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, null, $tags, $tag->id, $filterBy)}}">
                                    <input type="checkbox" name="tag_{{$tag->id}}" id="tag_{{$tag->id}}" {{in_array($tag->id, $tags) ? " checked" : "" }} class="whiteBackground" onclick="location.href='/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, null, $tags, $tag->id, null, $filterBy)}}';">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 flex-wrap">
            <form action="/search?{{ $functions['buildFilterQuery'](null, $categoryGroups, null, null, $durations, null, $tags, null, $filterBy)}}" class="d-flex" method="GET" id="searchForm">
                <input type="text" class="form-control me-2 textField whiteBackground" placeholder="Cari resep di sini" id="input_recipe" name="name" value="{{isset($name) ? $name : ""}}" data-type="recipe">
                <button class="btn btn-outline-success outlinedBtn whiteBackground" type="submit"><i class='fa fa-search'></i></button>
                <div class="sharpBox sortBtn" style="margin-right:0px; border-color:white; background-color:black; height:fit-content">
                    <div id="reviewFilterBtn" class="d-flex">
                        <p style="color:white; margin:0px 10px 0px 0px" id="sortLabel">Urutkan berdasarkan</p>
                        <img src="/assets/icons/dropdown_white.png" style="width:25px; height:25px;" alt="dropdown_icon">
                    </div>
                    <div class="dropdown-menu dropdown-menu-end" style="margin:40px 30px 0px 0px; border:2px solid black" id="reviewFilterDropdown">
                        <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery'](null, $categoryGroups, null, null, $durations, null, $tags, null, 'ratingDesc')}}">Rating tertinggi</a>
                        <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery'](null, $categoryGroups, null, null, $durations, null, $tags, null, 'ratingAsc')}}">Rating terendah</a>
                        <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery'](null, $categoryGroups, null, null, $durations, null, $tags, null, 'reviewCountDesc')}}">Ulasan terbanyak</a>
                        <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery'](null, $categoryGroups, null, null, $durations, null, $tags, null, 'reviewCountAsc')}}">Ulasan tersedikit</a>
                        <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery'](null, $categoryGroups, null, null, $durations, null, $tags, null, 'dateDesc')}}">Resep terbaru</a>
                        <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery'](null, $categoryGroups, null, null, $durations, null, $tags, null, 'dateAsc')}}">Resep terlama</a>
                    </div>
                </div>
            </form>
            <h3 class="sectionDivider">Rekomendasi</h3>
            <div class="d-flex flex-wrap" style="width:100%;">
                @forelse ($recipes as $recipe)
                    @php
                        $isNeedProcessTrack = Auth::check() && Auth::user()->id == $recipe->user_id;
                    @endphp
                    {{-- <div class="col"> --}}
                        @include('templates/recipeCard2', compact('recipe'))
                    {{-- </div> --}}
                @empty
                    <i class="emptySearch">Belum ada resep yang sesuai</i>
                @endforelse
            </div>
        </div>
    </div>
    <ul class="pagination d-flex justify-content-center">
        <li class="page-item">
            <a class="page-link" href="{{$recipes->previousPageUrl()}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @for ($i = 1; $i <= $recipes->lastPage() && $i <= 10; $i++)
            <li class="page-item">
                @if ($i == $recipes->currentPage())
                    <b><a class="page-link" href="{{$recipes->url($i)}}">{{$i}}</a></b>
                @else
                    <a class="page-link" href="{{$recipes->url($i)}}">{{$i}}</a>
                @endif
            </li>
        @endfor
        <li class="page-item">
            <a class="page-link" href="{{$recipes->nextPageUrl()}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
    <script>
        $(document).ready(function () {
            $('#reviewFilterBtn').click(function () {
                $('#reviewFilterDropdown').toggle();
            });
        });
        function setSortLabel(){
            let sortLabel = new URLSearchParams(window.location.search).get('filterBy');
            if(sortLabel){
                let setLableTo = 'Urutkan berdasarkan';
                if(sortLabel == 'ratingDesc') setLableTo = 'Rating tertinggi';
                if(sortLabel == 'ratingAsc') setLableTo = 'Rating terendah';
                if(sortLabel == 'reviewCountDesc') setLableTo = 'Ulasan terbanyak';
                if(sortLabel == 'reviewCountAsc') setLableTo = 'Ulasan tersedikit';
                if(sortLabel == 'dateDesc') setLableTo = 'Resep terbaru';
                if(sortLabel == 'dateAsc') setLableTo = 'Resep terlama';
                const sortLabelElement = document.getElementById('sortLabel');
                sortLabelElement.innerHTML = setLableTo;
            }
        }
        $(document).ready(function () {
            setSortLabel();
        });

        document.addEventListener("DOMContentLoaded", function() {
            function addAccordionClass() {
                if (window.innerWidth < 992) {
                    document.querySelectorAll('.accordion-button').forEach(function(element) {
                        element.classList.add('collapsed');
                    });
                    document.querySelectorAll('.accordion-collapse').forEach(function(element) {
                        element.classList.remove('show');
                    });
                } else {
                    document.querySelectorAll('.accordion-button').forEach(function(element) {
                        element.classList.remove('collapsed');
                    });
                    document.querySelectorAll('.accordion-collapse').forEach(function(element) {
                        element.classList.add('show');
                    });
                }
            }

            addAccordionClass();

            window.addEventListener('resize', function() {
                addAccordionClass();
            });
        });

        $(document).ready(function() {
            $(document).on('keypress', '#input_recipe', function(e) {
                if (e.which === 13) {
                    $('#searchForm').submit();
                }
            });
        });

        $('#input_recipe').typeahead({
            source: function (query, process) {
                var type = $('#input_recipe').data('type');
                return $.get("/showResult", {
                    query: query,
                    type: type
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection

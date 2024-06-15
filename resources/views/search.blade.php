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
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen--category{{$index}}" aria-expanded="true" aria-controls="panelsStayOpen--category{{$index}}">
                                {{$unique_ctg_group->class}}
                            </button>
                        </h2>
                        <div id="panelsStayOpen--category{{$index}}" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                @foreach ($category_all as $ctg)
                                    @if ($ctg->class == $unique_ctg_group->class)
                                        <a class="dropdown-item text-wrap" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, $index, $ctg->id, $durations, null, $tags, null)}}">
                                            <input type="checkbox" name="category_{{$ctg->id}}" id="category_{{$ctg->id}}" {{isset($categoryGroups[$index]) && in_array($ctg->id, $categoryGroups[$index]) ? "checked" : "" }} class="whiteBackground"onclick="location.href='/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, $index, $ctg->id, $durations, null, $tags, null)}}';">
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
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Durasi
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            @foreach ($duration_minutes as $minutes)
                                <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, $minutes, $tags, null)}}">
                                    <input type="checkbox" name="duration_{{$minutes}}" id="duration_{{$minutes}}" {{in_array($minutes, $durations) ? " checked" : "" }} class="whiteBackground" onclick="location.href='/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, $minutes, $tags, null)}}';">
                                    &le;{{$minutes}} menit
                                </a>
                            @endforeach
                            <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, -1, $tags, null)}}">
                                <input type="checkbox" name="duration_lainnya" id="duration_lainnya" {{in_array(-1, $durations) ? " checked" : "" }} class="whiteBackground">
                                Lainnya
                            </a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Tags
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            @foreach ($tag_all as $tag)
                                <a class="dropdown-item" href="/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, null, $tags, $tag->id)}}">
                                    <input type="checkbox" name="tag_{{$tag->id}}" id="tag_{{$tag->id}}" {{in_array($tag->id, $tags) ? " checked" : "" }} class="whiteBackground" onclick="location.href='/search?{{ $functions['buildFilterQuery']($name, $categoryGroups, null, null, $durations, null, $tags, $tag->id)}}';">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form action="/search?{{ $functions['buildFilterQuery'](null, null, null, null, null, null, null, null)}}" class="d-flex" method="GET" id="searchForm">
                <input type="text" class="form-control me-2 textField whiteBackground" placeholder="Cari resep di sini" id="input_recipe" name="name" value="{{isset($name) ? $name : ""}}" data-type="recipe">
                <button class="btn btn-outline-success outlinedBtn whiteBackground" type="submit"><i class='fa fa-search'></i></button>
            </form>
            <h3 class="sectionDivider">Recommendation</h3>
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @forelse ($recipes as $recipe)
                    @php
                        $isNeedProcessTrack = Auth::check() && Auth::user()->id == $recipe->user_id;
                    @endphp
                    <div class="col">
                        @include('templates/recipeCard', compact('recipe'))
                    </div>
                @empty
                    <h6 class="emptySearch">Belum ada resep yang sesuai.</h6>
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

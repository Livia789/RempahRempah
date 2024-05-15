@extends('templates/template')

@section('title', 'Resep : ' .$recipe->name)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/recipeDetail.css') }}">
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('js/recipeDetail.js')}}"></script>
<script>
    var token = '{{csrf_token()}}';
    var recipe_id = '{{$recipe->id}}';
    var user_id = '{{$user ? $user->id : -1}}';
</script>

@section('content')
    <div class="recipeDetailContainer">
        {{--  TODO  --}}
        <p>Path 1 > Path 2 > Path 3</p>

        <h1><b>{{ $recipe->name }}</b></h1>
        <div class="d-flex mt-1 mb-1">
            {{--  TODO: tanya pak bos, ini bs diklik apa mejeng doang? ap mau bikin bs ke search sesuai tagnya, misal "asin" tampilin smua resep yg ada tag asin  --}}
            @foreach($recipe->tags as $tag)
                <div class="sharpBox">
                    {{ $tag->name }}
                </div>
            @endforeach
        </div>
        <div class="d-flex">
            <?php
                $bookmarkImage = $user && $user->bookmarks()->where('recipe_id', $recipe->id)->exists() ? 'bookmark_black.png' : 'bookmark_white.png';
            ?>
            <div class="sharpBox" id="bookmarkButton">
                <img src="/assets/icons/{{ $bookmarkImage }}" id="bookmarkImage" class="picon" alt="bookmark_icon">
                Bookmark
            </div>

            <div style="margin:auto 10px auto 0px">
                Resep oleh
            </div>
            <div style="margin: auto 0px">
                <b class="roundedBox whiteBackground"><a href="#">{{ '@'.$recipe->creator->name }}</a></b>
            </div>
        </div>
        <div class="sharpBox recipeDetailSummaryCtr">
            @include('templates/rating', ['rating_avg' => $recipe->reviews->avg('rating')])

            <div class="separatorLine"></div>

            <img src="/assets/icons/empty_heart.png" class="picon mb-auto mt-auto" alt="heart_icon">
            <div class="mt-auto mb-auto ">
                <b>{{ $recipe->reviews->count() }} Ulasan</b>
            </div>

            <div class="separatorLine"></div>

            <b class="mt-auto mb-auto">
                {{ explode(" ", $recipe->created_at)[0] }}
            </b>

            <div class="separatorLine"></div>

            <img src="/assets/icons/time_icon.png" class="picon mb-auto mt-auto" alt="time_icon">
            <b class="mb-auto mt-auto">{{ $recipe->getDurationStr() }}</b>
        </div>

        <div class="d-flex imgDescContainer">
            <img src="{{ asset($recipe->img) }}" class="recipeImage" alt="recipe_image">
            <div>
                <h3><b>Deskripsi Resep</b></h3>
                {{ $recipe->description }}
            </div>
        </div>

        <div class="d-flex">
            <div style="width:45%; margin-right:50px;">
                <h3><b>Alat</b></h3>
                @if($recipe->tools->count() == 0)
                    <i>Tidak ada data alat untuk resep ini</i>
                @else
                    @foreach($recipe->tools as $tool)
                        <?php
                            $progress = $user_tools->where('tool_id', $tool->id)->first()
                        ?>
                        <div class="d-flex m-2 progressDiv toolDiv" tool_id="{{$tool->id}}" progress="{{$progress}}" onclick="toggleHighlight(this)" onmouseover="hoverHighlight(this)" onmouseout="hoverHighlight(this)">
                            <div class="box shortBox">
                                <img src="/assets/icons/check_grey.png" class="stepCheckIcon" alt="grey_check">
                            </div>
                            <div class="box longBox">
                                {{ $tool->name }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div style="width:45%">
                <h3><b>Nilai Gizi</b></h3>
                @if($recipe->nutrition->count() == 0)
                    <i>Tidak ada data nilai gizi untuk resep ini</i>
                @else
                    <table class="table table-striped" style="width=50%">
                    <thead>
                      <tr>
                        <th scope="col">Nilai Gizi</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Takaran Harian</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($recipe->nutrition as $nutrition)
                            <tr>
                                <td>{{ $nutrition->name }}</td>
                                <td>{{ $nutrition->pivot->quantity.' '.$nutrition->pivot->unit }}</td>
                                <td>{{ $nutrition->pivot->daily_intake }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                @endif
            </div>
        </div>

        <br><br>

        <div>
            <h3><b>Bahan</b></h3>
            <div class="d-flex">
                <div style="width:45%; margin-right:50px">
                    @foreach($recipe->ingredientHeaders as $ingredientHeader)
                        @if($loop->iteration%2 == 1)
                            <div class="d-flex m-2">
                                <div class="box longBox">
                                    <b>
                                        {{ $ingredientHeader->name }}
                                    </b>
                                </div>
                            </div>
                            <div>
                                @foreach($ingredientHeader->ingredients as $ingredient)
                                <?php
                                    $progress = $user_ingredients->where('ingredient_id', $ingredient->id)->first()
                                ?>
                                <div class="d-flex m-2 progressDiv ingredientDiv" ingredient_id="{{$ingredient->id}}" progress="{{$progress}}" onclick="toggleHighlight(this)" onmouseover="hoverHighlight(this)" onmouseout="hoverHighlight(this)">
                                    <div class="box shortBox">
                                        <img src="/assets/icons/check_grey.png" id="check_{{ $loop->iteration }}" class="stepCheckIcon" alt="grey_check">
                                    </div>
                                    <div class="box longbox">
                                        {{ $ingredient->pivot->quantity.' '.$ingredient->pivot->unit.' '.$ingredient->name }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <br>
                        @endif
                    @endforeach
                </div>
                <div style="width:45%">
                    @foreach($recipe->ingredientHeaders as $ingredientHeader)
                        @if($loop->iteration%2 == 0)
                            <div class="d-flex m-2">
                                <div class="box longBox">
                                    <b>
                                        {{ $ingredientHeader->name }}
                                    </b>
                                </div>
                            </div>
                            <div>
                                @foreach($ingredientHeader->ingredients as $ingredient)
                                <?php
                                    $progress = $user_ingredients->where('ingredient_id', $ingredient->id)->first()
                                ?>
                                <div class="d-flex m-2 progressDiv ingredientDiv" ingredient_id="{{$ingredient->id}}" progress="{{$progress}}" onclick="toggleHighlight(this)" onmouseover="hoverHighlight(this)" onmouseout="hoverHighlight(this)">
                                    <div class="box shortBox">
                                        <img src="/assets/icons/check_grey.png" id="check_{{ $loop->iteration }}" class="stepCheckIcon" alt="grey_check">
                                    </div>
                                    <div class="box longbox">
                                        {{ $ingredient->pivot->quantity.' '.$ingredient->pivot->unit.' '.$ingredient->name }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <br>
                        @endif
                    @endforeach
                </div>
            </div>
            <br>

        </div>

        <div class="d-flex">
            <div style="width:45%; margin-right:50px">
                <h3><b>Video Tutorial</b></h3>

                @if($recipe->vid != NULL)
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('storage/videos/'.$recipe->vid) }}" type="video/mp4">
                    </video>
                    <br><br><br>
                @else
                    <i>Tidak ada video untuk resep ini</i>
                @endif

                <div>
                    <h3 style="margin-top:40px"><b>Langkah</b></h3>
                    @foreach($recipe->stepHeaders as $stepHeader)
                        <div class="d-flex m-2">
                            <div class="box longBox" onclick="toggleHighlight(this)" onmouseover="hoverHighlight(this)" onmouseout="hoverHighlight(this)">
                                <b>
                                    {{ $stepHeader->name }}
                                </b>
                            </div>
                        </div>
                        <div>
                            @foreach($stepHeader->steps as $step)
                                <?php
                                    $progress = $step->stepProgress->first();            
                                ?>
                                <div class="d-flex m-2 stepDiv progressDiv" progress="{{$progress}}" step_id="{{$step->id}}" onclick="toggleHighlight(this)" onmouseover="hoverHighlight(this)" onmouseout="hoverHighlight(this)">
                                    <div class="box shortBox">
                                        <img src="/assets/icons/check_grey.png" id="check_{{ $loop->iteration }}" class="stepCheckIcon" alt="grey_check">
                                    </div>
                                    <div class="box longbox">
                                        {{ $step->step_desc }}
                                    </div>
                                </div>
                                @if($step->step_img != null)
                                    <img src="{{ asset($step->step_img) }}" class="stepImage" alt="step_image">
                                @endif
                            @endforeach
                        </div>
                        <br>
                @endforeach
                </div>
            </div>
            <div style="width:45%; background-color:black; padding:30px; border-radius:15px;">
                <div>
                    <div class="d-flex" style="justify-content:space-between; margin-bottom:30px; flex:1; overflow-y:auto;">
                        <h3><b style="color:white; ">Penilaian</b></h3>
                        <div class="sharpBox" style="border-color:white; background-color:black; height:fit-content">
                            <p style="color:white; margin:0px 10px 0px 0px">Urutkan</p>
                            <img src="/assets/icons/dropdown_white.png" style="width:25px; height:25px;" alt="dropdown_icon">
                        </div>
                    </div>
                    @foreach($recipe->reviews as $review)
                        @include('templates/reviewCard')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


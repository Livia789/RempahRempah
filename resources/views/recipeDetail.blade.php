@extends('templates/template')

@section('title', 'Resep : ' .$recipe->name)

@section('css')
    <link rel="stylesheet" href="{{ asset('css/recipeDetail.css') }}">
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
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
                <b class="roundedBox whiteBackground"><a href="/publicProfile/{{$recipe->creator->id}}">{{ '@'.$recipe->creator->name }}</a></b>
            </div>
        </div>
        <div class="sharpBox recipeDetailSummaryCtr">
            @include('templates/rating', ['rating_avg' => $reviews->avg('rating')])

            <div class="separatorLine"></div>

            <img src="/assets/icons/empty_heart.png" class="picon mb-auto mt-auto" alt="heart_icon">
            <div class="mt-auto mb-auto ">
                <b>{{ $reviews->count() }} Ulasan</b>
            </div>

            <div class="separatorLine"></div>

            <b class="mt-auto mb-auto">
                {{ explode(" ", $recipe->created_at)[0] }}
            </b>

            <div class="separatorLine"></div>

            <img src="/assets/icons/time_icon.png" class="picon mb-auto mt-auto" alt="time_icon">
            <b class="mb-auto mt-auto">{{ $recipe->getDurationStr() }}</b>
        </div>

        <div class="sharpBox" onclick="resetCookingProgress()">
            Reset Cooking Progress
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
                            $progress = Auth::user()? $user_tools->where('tool_id', $tool->id)->first() : null;
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
            @if($recipe->ingredientHeaders->count() == 0)
                <i>Tidak ada data bahan untuk resep ini</i>
            @endif
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
                                    $progress = Auth::user()? $user_ingredients->where('ingredient_id', $ingredient->id)->first() : null
                                ?>
                                <div class="d-flex m-2 progressDiv ingredientDiv" ingredient_id="{{$ingredient->id}}" progress="{{$progress}}" onclick="toggleHighlight(this)" onmouseover="hoverHighlight(this)" onmouseout="hoverHighlight(this)">
                                    <div class="box shortBox">
                                        <img src="/assets/icons/check_grey.png" id="check_{{ $loop->iteration }}" class="stepCheckIcon" alt="grey_check">
                                    </div>
                                    <div class="box longbox">
                                        @if($ingredient->pivot->unit)
                                            {{ $ingredient->pivot->quantity.' '.$ingredient->pivot->unit.' '.$ingredient->name }}
                                        @else
                                            {{ $ingredient->name.' '.$ingredient->pivot->quantity }}
                                        @endif
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
                                    $progress = Auth::user()? $user_ingredients->where('ingredient_id', $ingredient->id)->first() : null;
                                ?>
                                <div class="d-flex m-2 progressDiv ingredientDiv" ingredient_id="{{$ingredient->id}}" progress="{{$progress}}" onclick="toggleHighlight(this)" onmouseover="hoverHighlight(this)" onmouseout="hoverHighlight(this)">
                                    <div class="box shortBox">
                                        <img src="/assets/icons/check_grey.png" id="check_{{ $loop->iteration }}" class="stepCheckIcon" alt="grey_check">
                                    </div>
                                    <div class="box longbox">
                                        @if($ingredient->pivot->unit)
                                            {{ $ingredient->pivot->quantity.' '.$ingredient->pivot->unit.' '.$ingredient->name }}
                                        @else
                                            {{ $ingredient->name.' '.$ingredient->pivot->quantity }}
                                        @endif
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
            <div id="reviewSection" style="width:45%; background-color:black; padding:30px; border-radius:15px;">
                <div>
                    <div class="d-flex" style="justify-content:space-between; margin-bottom:30px; flex:1; overflow-y:auto;">
                        <h3><b style="color:white; ">Penilaian</b></h3>
                        <div class="sharpBox" style="margin-right:0px; border-color:white; background-color:black; height:fit-content">
                            <div id="reviewFilterBtn" class="d-flex">
                                <p style="color:white; margin:0px 10px 0px 0px" id="sortLabel">Urutkan</p>
                                <img src="/assets/icons/dropdown_white.png" style="width:25px; height:25px;" alt="dropdown_icon">
                            </div>
                            <div class="dropdown-menu dropdown-menu-end" style="margin:40px 30px 0px 0px; border:2px solid black" id="reviewFilterDropdown">
                                <a class="dropdown-item" href="/recipeDetail/{{$recipe->id}}?filter=dateDesc">Rating terbaru</a>
                                <a class="dropdown-item" href="/recipeDetail/{{$recipe->id}}?filter=dateAsc">Rating terlama</a>
                                <a class="dropdown-item" href="/recipeDetail/{{$recipe->id}}?filter=ratingDesc">Rating tertinggi</a>
                                <a class="dropdown-item" href="/recipeDetail/{{$recipe->id}}?filter=ratingAsc">Rating terendah</a>
                            </div>
                        </div>
                    </div>
                    @foreach($reviews as $review)
                        @include('templates/reviewCard')
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reviewFormContainer" aria-hidden="true">
        <div class="modal-dialog modalContainer modal-content" style="max-width: 80vw; width:60vw; height:90vh; background-color:white" >
            
            <div class="text-center justify-content-center" >
                <h1>Berikan Ulasan</h1>
                <p>Bagaimana pengalaman memasakmu? Yuk ceritakan pengalamanmu memasak dengan resep ini!</p>
                <img src="/assets/chef_review.png" style="height:150px; width:auto; border-radius:50%" alt="chef_review">
            </div>

            
            <form action="/submitReview" id="reviewForm" enctype="multipart/form-data" style="padding:30px" method="POST">
                @csrf
                <div class="col">
                    <label for="rating">Berikan bintang untuk resep ini</label><label style="color:rgb(255, 57, 57)">*</label>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <img src="/assets/icons/empty_star.png" id="star_{{$i}}" onclick="adjustStar({{$i}})" class="starIcon" alt="star_icon">
                        @endfor
                    </div>                  
                    <input type="hidden" id="reviewRating" name="rating" value=""></input>
                </div>
                <div class="col">
                    <label for="comment">Apa tanggapanmu mengenai resep ini?</label><label style="color:rgb(255, 57, 57)">*</label>
                    <textarea class="form-control textField whiteBackground" placeholder="Tulis tanggapanmu disini" id="reviewComment" name="comment" rows="3"></textarea>
                </div>
                <div class="col" style="display:flex; flex-direction: column">
                    <label for="img">Choose an image:</label>
                    <input type="file" id="reviewImg" name="img" accept="image/*"></input>  
                </div>
                <button type="button" onclick="submitReviewForm()" class="sharpBox mt-5">
                    Simpan
                </button>
                <p id="reviewErrorMsg" style="display:none; margin:0px; color:rgb(255, 57, 57)"></p>
                <input type="hidden" name="recipe_id" value="{{$recipe->id}}"></input>
                <input type="hidden" name="user_id" value="{{$user ? $user->id : -1}}"></input>
            </form>
            
        </div>
    </div>

    <div class="modal fade" id="doneCooking_resetProgressContainer" aria-hidden="true">
        <div class="modal-dialog modalContainer modal-content" style="max-width:40vw; width:40vw; background-color:white" >
            
            <div class="text-center justify-content-center" >
                <h1>Selamat!</h1>
                <p>Anda sudah mengikuti setiap langkah pada resep <b>{{$recipe->name}}</b> ala <b>{{'@'.$recipe->creator->name}}</b></p>
                <img src="/assets/chef_happy.png" style="border-radius:50%; height:150px; width:auto;" alt="chef_happy">

                <br><br><br>
                <p>Hapus progress memasak pada resep ini?</p>
                <div style="width:80%; margin:auto">
                    <div class="sharpBox" style="width:100%" onclick="doneCookingResetProgress(true)">Ya</div>
                    <div class="sharpBox" style="width:100%" onclick="doneCookingResetProgress(false)">Tidak</div>
                </div>
            </div>
        </div>
    </div>
@endsection


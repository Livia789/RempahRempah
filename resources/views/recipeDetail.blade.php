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
        <div class="d-flex">
            <h1><b>{{ $recipe->name }}</b></h1>
            @if(Auth::user() && Auth::user()->id == $recipe->creator->id)
                @if($recipe->isPublished())
                    <a class="sharpBox" style="margin-left:30px; background-color:rgb(210, 210, 210)" onclick="alert('Menyunting resep yang telah dirilis ke publik dapat menyebabkan anemia')">
                        <img src="/assets/icons/edit_icon.png" class="picon" alt="edit_icon">
                        Edit Resep
                    </a>
                @elseif($recipe->isPublicButNotPublished())
                    <a class="sharpBox" style="margin-left:30px; background-color:rgb(210, 210, 210)" onclick="alert('Menyunting resep yang dalam proses verifikasi dapat menyebabkan hipertensi')">
                        <img src="/assets/icons/edit_icon.png" class="picon" alt="edit_icon">
                        Edit Resep
                    </a>
                @else
                    <a class="sharpBox" style="margin-left:30px;" href="/editRecipe/{{$recipe->id}}">
                        <img src="/assets/icons/edit_icon.png" class="picon" alt="edit_icon">
                        Edit Resep
                    </a>
                @endif
            @endif
        </div>
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
            <div class="d-flex" style="margin:10px 0px">
                @if(!Auth::user() || Auth::user()->role == 'member')
                    <div class="sharpBox" id="bookmarkButton" style="margin-top:0px; margin-bottom:0px">
                        <img src="/assets/icons/{{ $bookmarkImage }}" id="bookmarkImage" class="picon" alt="bookmark_icon">
                        Bookmark
                    </div>
                @endif
                <div style="margin:auto 10px auto 0px">
                    Resep oleh
                </div>
                <div style="margin: auto 0px">
                    <b class="roundedBox whiteBackground"><a href="/publicProfile/{{$recipe->creator->id}}">{{ '@'.$recipe->creator->name }}</a></b>
                </div>
            </div>
        </div>
        <div class="sharpBox recipeDetailSummaryCtr webView">

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

            <div class="separatorLine"></div>

            <img src="/assets/icons/dish_icon.png" class="picon mb-auto mt-auto" alt="dish_icon">
            <b class="mb-auto mt-auto">{{ $recipe->serving }}&nbsp;sajian</b>
        </div>

        <div class="sharpBox recipeDetailSummaryCtr mwebView">
            @include('templates/miniRating', ['rating_avg' => $reviews->avg('rating')])
            <div class="phoneSeparatorLine"></div>

            <img src="/assets/icons/empty_heart.png" class="picon mb-auto mt-auto" alt="heart_icon">
            <div class="mt-auto mb-auto ">
                <b>{{ $reviews->count() }} ulasan </b>
            </div>
        </div>

        <div class="sharpBox recipeDetailSummaryCtr mwebView">
            <img src="/assets/icons/time_icon.png" class="picon mb-auto mt-auto" alt="time_icon">
            <b class="mb-auto mt-auto">{{ $recipe->getDurationStr() }}</b>

            <div class="phoneSeparatorLine"></div>

            <img src="/assets/icons/dish_icon.png" class="picon mb-auto mt-auto" alt="dish_icon">
            <b class="mb-auto mt-auto">{{ $recipe->serving }} sajian</b>
        </div>

        @if(!Auth::user() || Auth::user()->role == 'member')
            <div class="d-flex">
                <div class="sharpBox" onclick="$('#confirmation_resetProgressContainer').modal('show')">
                    <img src="/assets/icons/reset_icon.png" class="picon" alt="reset_icon">
                    Hapus Progress Memasak
                </div>
        
                <div class="sharpBox" onclick="showReviewRecipeModal()">
                    <img src="/assets/icons/review_icon.png" class="picon" alt="review_icon">
                    Ulas Resep
                </div>
            </div>
        @elseif(Auth::user()->role == 'ahli_gizi')
            @if(!$recipe->is_verified_by_admin)
                @if(!$recipe->rejectionReason)
                    <div class="sharpBox" style="background-color:rgb(189, 189, 189)" onclick="alert('Nilai gizi belum dapat diberikan karena resep masih belum diverifikasi admin')">
                        <img src="/assets/icons/nutrition_icon.png" class="picon" alt="nutrition_icon">
                        Menunggu verifikasi admin
                    </div>
                @else
                    <div class="sharpBox" style="background-color:rgb(189, 189, 189)" onclick="alert('Nilai gizi belum dapat diberikan karena resep masih belum diverifikasi admin')">
                        <img src="/assets/icons/nutrition_icon.png" class="picon" alt="nutrition_icon">
                        Nilai gizi tidak dapat ditambah karena resep ditolak admin
                    </div>
                @endif
            @elseif(!$recipe->nutrition->count() && !$recipe->energiDariLemak && !$recipe->energiDariLemak)
                @if($recipe->ahli_gizi_id == Auth::user()->id)
                    <div class="sharpBox" onclick="$('#addNutritionModalContainer').modal('show')">
                        <img src="/assets/icons/nutrition_icon.png" class="picon" alt="nutrition_icon">
                        Berikan Nilai Gizi
                    </div>
                @else
                    <div class="sharpBox" style="background-color:rgb(189, 189, 189)">
                        <img src="/assets/icons/nutrition_icon.png" class="picon" alt="nutrition_icon">
                        Nilai gizi akan diberikan oleh ahli gizi &nbsp;<b>"{{$recipe->ahli_gizi->name}}"</b>
                    </div>
                @endif
            @else
                <div class="sharpBox" style="background-color:rgb(189, 189, 189)" onclick="alert('Error : Informasi nilai gizi untuk resep ini telah dimasukkan.')">
                    <img src="/assets/icons/nutrition_icon.png" class="picon" alt="nutrition_icon">
                    Nilai gizi telah ditambahkan
                </div>
            @endif
        @elseif(Auth::user()->role == 'admin')
            <div class="d-flex">
                @if(!$recipe->is_verified_by_admin && $recipe->rejectionReason == NULL)
                    @if(Auth::user()->id == $recipe->admin_id)
                        <div class="sharpBox" onclick="$('#adminApproveRecipe').modal('show')">
                            <img src="/assets/icons/verification_accept.png" class="picon" alt="verification_icon">
                            Approve Resep
                        </div>
                        <div class="sharpBox"  onclick="$('#adminRejectRecipe').modal('show')">
                            <img src="/assets/icons/verification_reject.png" class="picon" alt="verification_icon">
                            Tolak Resep
                        </div>
                    @else
                        <div class="sharpBox" style="background-color:rgb(187, 187, 187)">
                            <img src="/assets/icons/verification_icon.png" class="picon" alt="verification_icon">
                            Verifikasi akan dilakukan oleh admin &nbsp;<b>"{{$recipe->admin->name}}"</b>
                        </div>
                    @endif
                @else
                    <div class="sharpBox" style="background-color:rgb(187, 187, 187)">
                        <img src="/assets/icons/verification_icon.png" class="picon" alt="verification_icon">
                        <?php $statusVerifikasiAdmin = $recipe->is_verified_by_admin ? 'DITERIMA' : 'DITOLAK' ?>
                        Resep sudah diverifikasi oleh admin dengan status &nbsp;<b>{{$statusVerifikasiAdmin}}</b>
                    </div>
                @endif
            </div>
        @endif

        <div class="d-flex imgDescContainer">
            <img src="{{ asset($recipe->img) }}" class="recipeImage" alt="recipe_image">
            <div style="text-align:justify">
                <h3><b>Deskripsi Resep</b></h3>
                {{ $recipe->description }}
            </div>
        </div>

        <div class="d-flex toolGiziCtr">
            <div class="mwebView toolGiziContentCtr">
                <h3><b>Informasi Nilai Gizi</b></h3>
                <p><i>Jumlah per sajian</i></p>
                
                @if($recipe->nutrition->count() == 0)
                    <i>Tidak ada data nilai gizi untuk resep ini</i>
                @else
                    <table class="table table-striped" style="width=50%">
                        <thead>
                            <tr>
                            <th scope="col">
                                <span>Energi Total</span>
                                <br>
                                <span style="font-weight:normal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Energi dari lemak</span>
                            </th>
                            <th></th>
                            <th scope="col" class="text-end">
                                <span>{{$recipe->energiTotal." kkal"}}</span>
                                <br>
                                <span style="font-weight:normal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$recipe->energiDariLemak." kkal"}}</span>
                            </th>
                            </tr>
                        </thead>  
                    </table>
                    <table class="table table-striped" style="width=50%">
                    <thead>
                      <tr>
                        <th scope="col">Nilai Gizi  </th>
                        <th scope="col">Berat</th>
                        <th scope="col">%AKG</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($recipe->nutrition as $nutrition)
                            <tr>
                                <td>{{ $nutrition->name }}</td>
                                <td>{{ $nutrition->pivot->quantity.' '.$nutrition->pivot->unit }}</td>
                                <td>{{ number_format($nutrition->pivot->akgPercentage, 2).' %' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                @endif
            </div>
            <div class="toolGiziContentCtr">
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
            <div style="width:45%; margin-right:50px;" class="webView">
                <h3><b>Informasi Nilai Gizi</b></h3>
                <p><i>Jumlah per sajian</i></p>
                
                @if($recipe->nutrition->count() == 0)
                    <i>Tidak ada data nilai gizi untuk resep ini</i>
                @else
                    <table class="table table-striped" style="width=50%">
                        <thead>
                            <tr>
                            <th scope="col">
                                <span>Energi Total</span>
                                <br>
                                <span style="font-weight:normal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Energi dari lemak</span>
                            </th>
                            <th></th>
                            <th scope="col" class="text-end">
                                <span>{{$recipe->energiTotal." kkal"}}</span>
                                <br>
                                <span style="font-weight:normal">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$recipe->energiDariLemak." kkal"}}</span>
                            </th>
                            </tr>
                        </thead>  
                    </table>
                    <table class="table table-striped" style="width=50%">
                    <thead>
                      <tr>
                        <th scope="col">Nilai Gizi  </th>
                        <th scope="col">Berat</th>
                        <th scope="col">%AKG</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($recipe->nutrition as $nutrition)
                            <tr>
                                <td>{{ $nutrition->name }}</td>
                                <td>{{ $nutrition->pivot->quantity.' '.$nutrition->pivot->unit }}</td>
                                <td>{{ number_format($nutrition->pivot->akgPercentage, 2).' %' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                @endif
            </div>
        </div>
        <br><br>

        <div class="webView">
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

        <div class="mwebView" style="flex-direction:column">
            @foreach($recipe->ingredientHeaders as $ingredientHeader)
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
            @endforeach
        </div>

        <div class="d-flex stepReviewCtr">
            <div style="margin-right:50px" class="stepReviewContentCtr">
                <h3><b>Video Tutorial</b></h3>

                @if($recipe->vid != NULL)
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset($recipe->vid) }}" type="video/mp4">
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
            <div id="reviewSection" style="background-color:black; padding:30px; border-radius:15px;" class="stepReviewContentCtr">
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

    @include('modals.reviewRecipeModal')
    @include('modals.doneCookingResetProgressModal')
    @include('modals.resetProgressConfirmationModal')
    @include('modals.addNutritionModal')
    @include('modals.adminVerificationModal')

@endsection


@extends('templates/profile')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/cookingProgress.css') }}">

@section('title', 'Rempah Rempah | Progress Memasak')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('js/cookingProgress.js')}}"></script>
<script>
    var token = '{{csrf_token()}}';
    var recipeCount = '{{count($recipes)}}';
    var user_id = '{{$user ? $user->id : -1}}';
</script>
@section('profileContent')
    @include('modals.confirmationModal')
    <div class="cookingProgressContainer">
        <div>
            <h1>Progres Memasak</h1>
        </div>

        <div id="findRecipes" style="display:none;">
            <i>Saat ini tidak ada progress memasak. Mari temukan resep untuk dimasak hari ini</i>
            <div class="sharpBox btnSearchRecipe">
                <a href="/search" style="text-decoration: none; color:black">
                    Temukan Resep
                </a>
            </div>
        </div>

        @foreach($recipes as $recipe)
            <div class="progressCard" style="text-decoration:none; color:black;">
                <div class="d-flex" style="text-align:center; justify-content:center;">
                    <a href="/recipeDetail/{{$recipe->id}}" style="flex:1; padding-left:25px; color:black">
                        <h5>{{$recipe->name}}</h5>
                    </a>
                    <img id="btnRemoveProgress" confAction="removeProgress" onclick="showConfirmationModal(this)" recipe_id="{{$recipe->id}}" onmouseover="setTrashOpen(this)" onmouseout="setTrashClosed(this)" class="trash_closed" src="/assets/icons/trash_closed.png" style="width:25px; height:25px; text-align:right" alt="trash_icon">
                </div>
                <a href="/recipeDetail/{{$recipe->id}}" style="color:black">
                    <div class="d-flex cookingProgressContent" style="padding-top:30px;">
                        <img src="{{ asset($recipe->img) }}" alt="{{$recipe->name}}" class="myCookingProgressCardImage">
                        <?php
                            $userSteps = $user->recipeStepProgress($recipe->id)->count();
                            $recipeSteps = $recipe->totalSteps();
                            $stepPercentage = $recipeSteps? number_format($userSteps/$recipeSteps*100, 2) : 100;

                            $userIngredients = $user->recipeIngredientProgress($recipe->id)->count();
                            $recipeIngredients = $recipe->totalIngredients();
                            $ingredientPercentage = $recipeSteps? number_format($userIngredients/$recipeIngredients*100, 2) : 100;

                            $userTools = $user->recipeToolProgress($recipe->id)->count();
                            $recipeTools = $recipe->totalTools();
                            $toolPercentage = $recipeSteps? number_format($userTools/$recipeTools*100, 2) : 100;
                        ?>
                        <div style="width:100%" class="progressBarCtr">
                            @if($recipeIngredients)
                                <div class="d-flex">
                                    <div style="width:40%">
                                        <p>Bahan</p>
                                    </div>
                                    <div class="progressBar">
                                        <div class="progressBarFiller" style="width:{{$ingredientPercentage}}%"></div>
                                    </div>
                                    <div>
                                        <b>{{$userIngredients}}/{{$recipeIngredients}}</b> <span class="webView">selesai</span>
                                    </div>
                                </div>
                            @endif

                            @if($recipeTools)
                                <div class="d-flex">
                                    <div style="width:40%">
                                        <p>Alat</p>
                                    </div>
                                    <div class="progressBar">
                                        <div class="progressBarFiller" style="width:{{$toolPercentage}}%"></div>
                                    </div>
                                    <div>
                                        <b>{{$userTools}}/{{$recipeTools}}</b> <span class="webView">selesai</span>
                                    </div>
                                </div>
                            @endif

                            @if($recipeSteps)
                                <div class="d-flex">
                                    <div style="width:40%">
                                        <p>langkah</p>
                                    </div>
                                    <div class="progressBar">
                                        <div class="progressBarFiller" style="width:{{$stepPercentage}}%"></div>
                                    </div>
                                    <div>
                                        <b>{{$userSteps}}/{{$recipeSteps}}</b> <span class="webView">selesai</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

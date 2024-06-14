@extends('templates/template')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cookingProgress.css') }}">
@endsection

@section('title', 'Rempah Rempah | Progress Memasak')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('js/cookingProgress.js')}}"></script>
<script>
    var token = '{{csrf_token()}}';
    var recipeCount = '{{count($recipes)}}';
    var user_id = '{{$user ? $user->id : -1}}';
</script>
@section('content')
    <div class="cookingProgressContainer">
        <div>
            <h1>Progress Memasak</h1>
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
            <a href="/recipeDetail/{{$recipe->id}}" class="progressCard" style="text-decoration:none; color:black">
                <div class="d-flex" style="text-align:center; justify-content:center; margin-bottom:30px">
                    <h5 style="flex:1; padding-left:25px">{{$recipe->name}}</h5>
                    <img id="btnRemoveProgress" onclick="removeProgress(this)" recipe_id="{{$recipe->id}}" onmouseover="setTrashOpen(this)" onmouseout="setTrashClosed(this)" class="trash_closed" src="/assets/icons/trash_closed.png" style="width:25px; height:25px; text-align:right" alt="trash_icon">
                </div>

                <div class="d-flex">
                    <img src="{{ asset($recipe->img) }}" alt="{{$recipe->name}}" style="height:25%; width:25%; margin-right:20px">
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
                    <div style="width:100%">

                        @if($recipeIngredients)
                            <div class="d-flex">
                                <div style="width:40%">
                                    <p>Ingredients Prepared</p>
                                </div>
                                <div class="progressBar">
                                    <div class="progressBarFiller" style="width:{{$ingredientPercentage}}%"></div>
                                </div>
                                <div>
                                    <b>{{$userIngredients}}/{{$recipeIngredients}}</b> completed
                                </div>
                            </div>
                        @endif

                        @if($recipeTools)
                            <div class="d-flex">
                                <div style="width:40%">
                                    <p>Tools Prepared</p>
                                </div>
                                <div class="progressBar">
                                    <div class="progressBarFiller" style="width:{{$toolPercentage}}%"></div>
                                </div>
                                <div>
                                    <b>{{$userTools}}/{{$recipeTools}}</b> completed
                                </div>
                            </div>
                        @endif

                        @if($recipeSteps)
                            <div class="d-flex">
                                <div style="width:40%">
                                    <p>Steps completed</p>
                                </div>
                                <div class="progressBar">
                                    <div class="progressBarFiller" style="width:{{$stepPercentage}}%"></div>
                                </div>
                                <div>
                                    <b>{{$userSteps}}/{{$recipeSteps}}</b> completed
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

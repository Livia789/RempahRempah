<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'showHomePage']);
Route::get('/home', [PageController::class, 'showHomePage']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [PageController::class, 'showLoginPage']);

    Route::post('/login', [UserController::class, 'login']);
});

Route::group(['middleware' => ['loggedin']], function () {
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/temp/avoidedIngredients', [PageController::class, 'showAvoidedIngredientsPage']);
    Route::get('/temp/myRecipes', [PageController::class, 'showMyRecipesPage']);
    Route::get('/temp/myReviews', [PageController::class, 'showMyReviewsPage']);
    Route::get('/temp/bookmarks', [PageController::class, 'showMyBookmarksPage']);
    Route::get('/temp/recipeDetail/{recipe_id}', [PageController::class, 'showRecipeDetailPage']);
    Route::get('/temp/search/{ingredientName}', [PageController::class, 'showRecipesPage']);
});

<?php

use App\Http\Controllers\EmailController;
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
Route::get('/search', [PageController::class, 'showSearchPage']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [PageController::class, 'showLoginPage']);
    Route::get('/register', [PageController::class, 'showRegisterPage']);
    Route::get('/resetPassword', [PageController::class, 'showResetPasswordPage']);
    Route::get('/temp/recipeDetail/{recipe_id}', [PageController::class, 'showRecipeDetailPage']);

    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/sendResetPasswordMail', [EmailController::class, 'sendResetPasswordMail']);
    Route::post('/resetPassword', [UserController::class, 'resetPassword']);

});

Route::group(['middleware' => ['loggedin']], function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/welcome', [PageController::class, 'showWelcomePage']);

    Route::post('/updatePrefPage', [PageController::class, 'updatePrefPage']);
    Route::post('/updatePreferences', [UserController::class, 'updatePreferences']);

    Route::get('/myPreferences', [PageController::class, 'showMyPreferencesPage']);
    Route::get('/myProfile', [PageController::class, 'showMyProfilePage']);
    Route::get('/temp/myRecipes', [PageController::class, 'showMyRecipesPage']);
    Route::get('/myReviews', [PageController::class, 'showMyReviewsPage']);
    Route::get('/temp/myBookmarks', [PageController::class, 'showMyBookmarksPage']);
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);
    Route::post('/updatePassword', [UserController::class, 'updatePassword']);
});

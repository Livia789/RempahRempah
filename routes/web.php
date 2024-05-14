<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RecipeController;

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
Route::get('/showResult', [PageController::class, 'showResult']);
// utk semua route yg utk show page di bawah ini (tdk termasuk middleware lain)
// dicek dl accountstatusnya, kalo 'new' redirect welcome (liat yg di showSearchPage aja 3 line)
Route::get('/search', [PageController::class, 'showSearchPage']);
Route::get('/temp/recipeDetail/{recipe_id}', [PageController::class, 'TEMP_showRecipeDetailPage']);
Route::get('/recipeDetail/{recipe_id}', [PageController::class, 'showRecipeDetailPage']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [PageController::class, 'showLoginPage']);
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register', [PageController::class, 'showRegisterPage']);
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/resetPassword', [PageController::class, 'showResetPasswordPage']);
    Route::post('/sendResetPasswordMail', [EmailController::class, 'sendResetPasswordMail']);
    Route::post('/resetPassword', [UserController::class, 'resetPassword']);

    Route::get('/temp/recipeDetail/{recipe_id}', [PageController::class, 'showRecipeDetailPage']);
});

Route::group(['middleware' => ['loggedin']], function () {
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/welcome', [PageController::class, 'showWelcomePage']);
    Route::get('/myPreferences', [PageController::class, 'showMyPreferencesPage']);
    Route::post('/updateSelected', [PageController::class, 'updateSelected']);
    Route::post('/w', [UserController::class, 'updatePreferences']);

    Route::get('/myProfile', [PageController::class, 'showMyProfilePage']);
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);
    Route::get('/myPassword', [PageController::class, 'showMyPasswordPage']);
    Route::post('/updatePassword', [UserController::class, 'updatePassword']);

    Route::get('/myReviews', [PageController::class, 'showMyReviewsPage']);
    Route::get('/temp/myRecipes', [PageController::class, 'showMyRecipesPage']);
    Route::get('/temp/myBookmarks', [PageController::class, 'showMyBookmarksPage']);

    Route::get('/addRecipe', [PageController::class, 'showAddRecipePage']);
    Route::post('/addRecipe', [RecipeController::class, 'addRecipe']);
    Route::post('/updateTagPage', [PageController::class, 'updateTagPage']);
});

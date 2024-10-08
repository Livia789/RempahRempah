<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StepProgressController;
use App\Http\Controllers\UserIngredientProgressController;
use App\Http\Controllers\UserToolProgressController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\CommentController;

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
Route::get('/recipeDetail/{recipe_id}', [PageController::class, 'showRecipeDetailPage']);
Route::get('/publicProfile/{public_profile_id}', [PageController::class, 'showPublicProfilePage']);
Route::get('/aboutUs', [PageController::class, 'showAboutUsPage']);

//progress routes
Route::post('/toggleStepProgress', [StepProgressController::class, 'toggleStepProgress']);
Route::post('/toggleUserIngredientProgress', [UserIngredientProgressController::class, 'toggleUserIngredientProgress']);
Route::post('/toggleUserToolProgress', [UserToolProgressController::class, 'toggleUserToolProgress']);
Route::post('/resetCookingProgress', [ProgressController::class, 'resetCookingProgress']);
Route::get('/getCookingProgress', [ProgressController::class, 'guest_getCookingProgress']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [PageController::class, 'showLoginPage']);
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register', [PageController::class, 'showRegisterPage']);
    Route::post('/sendWelcomeMail', [EmailController::class, 'sendResetPasswordMail']);
    Route::post('/register', [UserController::class, 'register']);

    Route::get('/resetPassword', [PageController::class, 'showResetPasswordPage']);
    Route::post('/sendResetPasswordMail', [EmailController::class, 'sendResetPasswordMail']);
    Route::post('/resetPassword', [UserController::class, 'resetPassword']);
});

Route::group(['middleware' => ['loggedin']], function () {
    Route::get('/logout', [UserController::class, 'logout']);
});

Route::group(['middleware' => ['adminormember']], function () {
    Route::get('/addRecipe', [PageController::class, 'showAddRecipePage']);
    Route::get('/editRecipe/{recipe_id}', [PageController::class, 'showEditRecipePage']);
    Route::post('/addRecipe', [RecipeController::class, 'addRecipe']);
    Route::get('/showResultInputTag', [PageController::class, 'showResultInputTag']);
    Route::post('/updateSelected', [PageController::class, 'updateSelected']);
    Route::post('/deleteReview', [ReviewController::class, 'deleteReview']);
});

Route::group(['middleware' => ['adminorahligizi']], function () {
    Route::get('/recipeVerification', [PageController::class, 'showRecipeVerificationPage']);
});

Route::group(['middleware' => ['member']], function () {
    Route::get('/welcome', [PageController::class, 'showWelcomePage']);
    Route::get('/myPreferences', [PageController::class, 'showMyPreferencesPage']);
    Route::post('/updatePreferences', [UserController::class, 'updatePreferences']);

    Route::get('/myProfile', [PageController::class, 'showMyProfilePage']);
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);
    Route::get('/myPassword', [PageController::class, 'showMyPasswordPage']);
    Route::post('/updatePassword', [UserController::class, 'updatePassword']);
    Route::post('/editProfileImage', [UserController::class, 'editProfilePicture']);

    Route::get('/myCookingProgress', [PageController::class, 'showMyCookingProgressPage']);
    Route::get('/myReviews', [PageController::class, 'showMyReviewsPage']);
    Route::get('/myRecipes', [PageController::class, 'showMyRecipesPage']);
    Route::get('/myBookmarks', [PageController::class, 'showMyBookmarksPage']);
    Route::get('/myCookingHistory', [PageController::class, 'showMyCookingHistoryPage']);

    Route::post('/toggleBookmark', [BookmarkController::class, 'toggleBookmark']);
    Route::post('/addBookmark', [BookmarkController::class, 'addBookmark']);
    Route::post('/likeReview', [ReviewController::class, 'likeReview']);
    Route::post('/dislikeReview', [ReviewController::class, 'dislikeReview']);
    Route::post('/submitReview', [ReviewController::class, 'submitReview']);
    Route::post('/toggleFollowUser', [UserController::class, 'toggleFollowUser']);

    Route::post('/deleteRecipe/{recipe_id}', [RecipeController::class, 'deleteRecipe']);
    Route::post('/addComment', [CommentController::class, 'addComment']);
    Route::post('/addReply', [CommentController::class, 'addReply']);
    Route::post('/deleteComment', [CommentController::class, 'deleteComment']);
    Route::post('/deleteReply', [CommentController::class, 'deleteReply']);
});

Route::group(['middleware' => ['admin']], function () {
    Route::post('/rejectRecipe', [RecipeController::class, 'rejectRecipe']);
    Route::post('/approveRecipe', [RecipeController::class, 'approveRecipe']);
    Route::get('/viewMembers', [PageController::class, 'showViewMembersPage']);
    Route::get('/viewAhliGizi', [PageController::class, 'showViewAhliGiziPage']);
});

Route::group(['middleware' => ['ahligizi']], function () {
    Route::post('/addNutrition', [NutritionController::class, 'addNutrition']);
});

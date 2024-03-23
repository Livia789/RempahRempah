<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'home']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [UserController::class, 'viewLogin']);

    Route::post('/login', [UserController::class, 'login']);
});

Route::group(['middleware' => ['loggedin']], function () {
    Route::get('/logout', [UserController::class, 'logout']);
});

<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', [UserController::class, 'showAuthUser']);
Route::middleware('auth:api')->get('/apiUsers', [UserController::class, 'apiUsers'])->name('api.users');
Route::middleware('auth:api')->resource('users', UserController::class)->except(['create', 'edit']);
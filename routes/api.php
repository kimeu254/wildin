<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/profile', [ProfileController::class, 'show']);
Route::put('/profile/{id}', [ProfileController::class, 'update']);
Route::put('/profile/cover/{id}', [ProfileController::class, 'updateCover']);
Route::put('/profile/profile-pic/{id}', [ProfileController::class, 'updateProfilePic']);
Route::put('/profile/cover-remove/{id}', [ProfileController::class, 'destroyCover']);
Route::put('/profile/profile-pic-remove/{id}', [ProfileController::class, 'destroyProfilePic']);
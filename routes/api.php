<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('user_role')->group(function () {
    Route::get('list', [UserRoleController::class, 'index']);
    Route::get('find/{id}', [UserRoleController::class, 'show']);
    Route::post('store', [UserRoleController::class, 'store']);
    Route::put('update/{id}', [UserRoleController::class, 'update']);
    Route::delete('delete/{id}', [UserRoleController::class, 'destroy']);
});

Route::prefix('screen')->group(function () {
    Route::get('list', [ScreenController::class, 'index']);
    Route::get('find/{id}', [ScreenController::class, 'show']);
    Route::post('store', [ScreenController::class, 'store']);
    Route::put('update/{id}', [ScreenController::class, 'update']);
    Route::delete('delete/{id}', [ScreenController::class, 'destroy']);
});

Route::prefix('user')->group(function () {
    Route::get('list', [UserController::class, 'index']);
    Route::get('find/{id}', [UserController::class, 'show']);
    Route::post('store', [UserController::class, 'store']);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::delete('delete/{id}', [UserController::class, 'destroy']);
});

Route::prefix('accesscontrol')->group(function () {
    Route::get('list', [AccessController::class, 'index']);
    Route::get('find/{id}', [AccessController::class, 'show']);
    Route::post('store', [AccessController::class, 'store']);
    Route::put('update/{id}', [AccessController::class, 'update']);
    Route::delete('delete/{id}', [AccessController::class, 'destroy']);
});

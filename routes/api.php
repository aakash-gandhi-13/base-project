<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\ScreenController;

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
    Route::get('records', [UserRoleController::class, 'index']);
    Route::get('find/{id}', [UserRoleController::class, 'show']);
    Route::post('store', [UserRoleController::class, 'store']);
    Route::put('update/{id}', [UserRoleController::class, 'update']);
    Route::delete('delete/{id}', [UserRoleController::class, 'destroy']);
});

Route::prefix('screen')->group(function () {
    Route::get('records', [ScreenController::class, 'index']);
    Route::get('find/{id}', [ScreenController::class, 'show']);
    Route::post('store', [ScreenController::class, 'store']);
    Route::put('update/{id}', [ScreenController::class, 'update']);
    Route::delete('delete/{id}', [ScreenController::class, 'destroy']);
});

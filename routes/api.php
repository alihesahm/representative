<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:admin')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:broker')->get('/user1', function (Request $request) {
    return $request->user();
});
Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});
Route::prefix('user')->group(function () {
    Route::post('/login', [\App\Http\Controllers\User\AuthController::class, 'login']);
});

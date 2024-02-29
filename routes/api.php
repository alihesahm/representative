<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrokerController;
use App\Http\Controllers\Shared\ClientsController;
use App\Http\Controllers\Shared\ProjectsController;
use App\Http\Controllers\Shared\VisitsController;
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

Route::middleware('auth:admin')->prefix('/admin')-> group(function () {
    Route::controller(BrokerController::class)->prefix('/brokers')->group(function () {
        Route::post('/', 'store');
    });
});

Route::middleware('auth:broker')->group(function () {
    Route::controller(ProjectsController::class)->prefix('projects')->group(function () {
        Route::get('/list', 'list');
        Route::post('/', 'store');
    });

    Route::controller(ClientsController::class)->prefix('clients')->group(function () {
        Route::get('/list', 'list');
        Route::post('/', 'store');
    });

    Route::controller(VisitsController::class)->prefix('visits')->group(function () {
        Route::post('/', 'store');
    });
});
Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});
Route::prefix('user')->group(function () {
    Route::post('/login', [\App\Http\Controllers\User\AuthController::class, 'login']);
});
Route::get('/test',function (){
    return response()->json(['message' => 'Hello World']);
});

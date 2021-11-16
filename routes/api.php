<?php

use App\Http\Controllers\Api\TeamGroupController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\ResultGameController;
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
/*
Route::name('api.')->group(function () {
    Route::apiResource('teamgroup', TeamGroupController::class)->only(['create']);
});*/

Route::middleware('auth')->group(function () {
    Route::apiResource('teamgroup', TeamGroupController::class)->only(['store']);
    Route::apiResource('game', GameController::class)->only(['store']);
    Route::apiResource('resultgame', ResultGameController::class)->only(['store']);
});

//Route::apiResource('teamgroup', TeamGroupController::class)->only(['store']);
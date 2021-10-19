<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommittesController;
use App\Http\Controllers\Api\CoursesController;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\TracksController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login',[AuthController::class,'login'])->name('login');


Route::apiResource('/committe',CommittesController::class);
Route::apiResource('/committe/{committe}/track',TracksController::class);
Route::apiResource('/track/{track}/course',CoursesController::class);
Route::apiResource('/course/{course}/session',SessionController::class);
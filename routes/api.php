<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIAuthController;

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

Route::group(['middleware'=>'api','prefix'=>'auth'], function($router){ 
    Route::post('/apiregister', [APIAuthController::class, 'register']);
    Route::post('/apilogin', [APIAuthController::class, 'login']);
    Route::get('/apiprofile', [APIAuthController::class, 'profile']);
    Route::post('/apilogout', [APIAuthController::class, 'logout']);
    Route::post('/editprofile', [APIAuthController::class, 'editprofile']);
    Route::post('/createUser', [APIAuthController::class, 'createUser']);
    Route::post('/actUser', [APIAuthController::class, 'actUser']);
    Route::post('/deactUser', [APIAuthController::class, 'deactUser']);
    Route::post('/apiforgot', [APIAuthController::class, 'forgot']);
});
<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\DebtsController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\DriveController;
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


Route::group(['prefix' => 'v1'], function () {

    //guest routes


    Route::post('/register',[DriverController::class,'Register']);
    Route::post('/verify',[UserController::class,'verify'])->middleware('auth:sanctum');
    Route::post('/Regenerate',[UserController::class,'Regenerate'])->middleware('auth:sanctum');
    Route::post('/login',[UserController::class,'login']);
    Route::post('/logout',[UserController::class,'logout'])->middleware('auth:sanctum');
    Route::get('/rules',[UserController::class,'rules']);
    Route::put('updaterules',[UserController::class , 'updaterules']);
    Route::post('/profile/update',[UserController::class,'updateprofile'])->middleware('auth:sanctum');
    Route::get('/profile',[UserController::class,'profile'])->middleware('auth:sanctum');



    Route::get('/debts/count',[DebtsController::class,'count']);
    Route::post('/debts/store',[DebtsController::class,'store'])->middleware('auth:sanctum','verify');
    Route::get('/home',[HomeController::class,'index']);

    Route::put('/home/update',[HomeController::class,'store'])->middleware('auth:sanctum');

    // article

    Route::get('/articles/index',[ArticleController::class,'index']);
    Route::get('/articles/show/{id}',[ArticleController::class,'show']);
    Route::post('/articles/store',[ArticleController::class,'store']);



    //protected routes


});

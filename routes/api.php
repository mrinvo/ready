<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\DebtsController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\DriveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CamelController;

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


    Route::post('/driver/register',[DriveController::class,'Register']);
    Route::post('/driver/verify',[DriveController::class,'verify'])->middleware('auth:sanctum');
    Route::post('/driver/name',[DriveController::class,'name'])->middleware('auth:sanctum');
    Route::post('/driver/driving_lic',[DriveController::class,'driving_lic'])->middleware('auth:sanctum');
    Route::post('/driver/car_lic',[DriveController::class,'car_lic'])->middleware('auth:sanctum');
    Route::post('/driver/photo',[DriveController::class,'photo'])->middleware('auth:sanctum');
    Route::post('/driver/personal_id_photo',[DriveController::class,'personal_id_photo'])->middleware('auth:sanctum');
    Route::post('/driver/logout',[DriveController::class,'logout'])->middleware('auth:sanctum');

    Route::post('/camel/register',[CamelController::class,'Register']);
    Route::post('/camel/verify',[CamelController::class,'verify'])->middleware('auth:sanctum');
    Route::post('/camel/name',[CamelController::class,'name'])->middleware('auth:sanctum');
    Route::post('/camel/logout',[CamelController::class,'logout'])->middleware('auth:sanctum');


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

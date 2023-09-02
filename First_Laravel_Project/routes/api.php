<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ToDoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/student' , StudentController::class);
Route::apiResource('to-dos' , ToDoController::class);
Route::get('to-dos/name/{name}' , [ToDoController::class,'todo']);

Route::post('test-file',[TestController::class,'storeFile']);

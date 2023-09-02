<?php

use App\Events\CallEvent;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/' ,[StudentController::class , 'index']);
// Route::get('/create' , [StudentController::class , 'create' ]);
// Route::post('/' , [StudentController::class , 'store']);
// Route::get('/{id}' , [StudentController::class , 'show']);
// Route::get('/update/{id}' , [StudentController::class , 'edit']);
// Route::patch('/{id}' , [StudentController::class , 'update']);
// Route::get('/delete/{id}' , [StudentController::class , 'destroy']);
Route::resource('/students' , StudentController::class);


Route::get('test' , function(){
   return response()->json([
    'message' => 'WELCOME'
   ]);
})->middleware('over_18');


Route::get('/user',function() {
   $data = [
      'title' => 'test4',
      'message' => 'four bla bla'
   ];
   event(new CallEvent($data));
});

Route::get('/',function() {
   $user = new User();
   $user->name = 'Ko Ko';
   $user->email = "koko@gmail.com";
   $user->password = "internet";
   $user->save();
   return $user;
});

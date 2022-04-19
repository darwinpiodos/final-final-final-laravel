<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;





Route::post('register',[UserController::class,'register']); 
Route::post('login',[UserController::class,'login']);

Route::get('list',[UserController::class,'list']); 
Route::delete('delete/{id}',[UserController::class,'delete']); 
Route::get('edit/{id}',[UserController::class,'edit']); 
Route::get('profile/{id}',[UserController::class,'profile']); 
Route::put('update/{id}',[UserController::class,'update']); 
 




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use App\Http\Controllers\api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(CategoryController::class)->group(function (){
    Route::get('/categories','index');
    Route::post('/category','store');
    Route::get('/delete-category/{id}','destroy');
});

<?php

use App\Http\Controllers\api\branch\BranchController;
use App\Http\Controllers\api\branch\BranchDeliveryController;


use App\Http\Controllers\api\cateory\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::post('/category', 'store');
    Route::get('/delete-category/{id}', 'destroy');
    Route::post('/category/{id}', 'update');
});

Route::controller(BranchController::class)->group(function () {
    Route::get('/branches', 'index');
    Route::post('/branch', 'store');
    Route::get('/delete-branch/{id}', 'destroy');
    Route::post('/branch/{id}', 'update');
});

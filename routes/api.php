<?php

use App\Http\Controllers\api\branch\BranchController;
use App\Http\Controllers\api\branch\BranchDeliveryController;


use App\Http\Controllers\api\cateory\CategoryController;
use App\Http\Controllers\api\sub_category\SubCategoryController;
use App\Models\DeliveryPlan;
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
Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/subCategories', 'index');
    Route::post('/subCategory', 'store');
    Route::get('/delete-subCategory/{id}', 'destroy');
    Route::post('/subCategory/{id}', 'update');
});

Route::controller(BranchController::class)->group(function () {
    Route::get('/branches', 'index');
    Route::post('/branch', 'store');
    Route::get('/delete-branch/{id}', 'destroy');
    Route::post('/branch/{id}', 'update');
});

Route::controller(DeliveryPlan::class)->group(function () {
    Route::get('/deliveryPlans', 'index');
    Route::post('/deliveryPlan', 'store');
    Route::get('/delete-deliveryPlan/{id}', 'destroy');
    Route::post('/deliveryPlan/{id}', 'update');
});

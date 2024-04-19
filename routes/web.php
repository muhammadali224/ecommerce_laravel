<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryPlanController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/delivery_plans', DeliveryPlanController::class);
Route::resource('/branches', BranchController::class);
Route::resource('/categories', CategoryController::class);



Route::get('/{page}', [AdminController::class, 'index']);

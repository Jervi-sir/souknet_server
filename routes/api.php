<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Auth\UserAuthController;
use App\Http\Controllers\API\v1\Auth\AdminAuthController;
use App\Http\Controllers\API\v1\Auth\BusinessAuthController;
use App\Http\Controllers\API\v1\BusinessController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Business
|--------------------------------------------------------------------------
*/
Route::middleware('guest:sanctum')->group( function () {
    Route::post('/company/register', [BusinessAuthController::class, 'registerCompany']);     //api[done]
    Route::post('/company/login', [BusinessAuthController::class, 'loginCompany']);           //api[done] 
});

Route::middleware(['auth:sanctum', 'type.company'])->group( function () {
    Route::post('/company/logout', [BusinessAuthController::class, 'logoutCompany']);         //api[done]
    Route::post('/company/post-product', [BusinessController::class, 'postProduct']);
    Route::post('/company/post-service', [BusinessController::class, 'postService']);
});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Route::middleware('guest:sanctum')->group( function () {
    Route::post('/user/register', [UserAuthController::class, 'registerUser']);                 //api[done] 
    Route::post('/user/login', [UserAuthController::class, 'loginUser']);                       //api[done]    
});
Route::middleware(['auth:sanctum', 'type.user'])->group( function () {
    Route::post('/user/logout', [UserAuthController::class, 'logoutUser']);                     //api[done]
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::post('/admin/register', [AdminAuthController::class, 'registerAdmin']);  //[]
Route::post('/admin/login', [AdminAuthController::class, 'loginAdmin']);        //[]
Route::middleware(['auth:sanctum', 'type.admin'])->group( function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logoutAdmin']);  //[]
});


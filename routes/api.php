<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\Auth\UserAuthController;
use App\Http\Controllers\API\v1\Auth\AdminAuthController;
use App\Http\Controllers\API\v1\Auth\BusinessAuthController;

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
    Route::post('/business/register', [BusinessAuthController::class, 'registerBusiness']);     //[x]
    Route::post('/business/login', [BusinessAuthController::class, 'loginBusiness']);           //[x]
});

Route::middleware(['auth:sanctum', 'type.business'])->group( function () {
    Route::post('/business/logout', [BusinessAuthController::class, 'logoutBusiness']);     //[x]
});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Route::middleware('guest:sanctum')->group( function () {
    Route::post('/user/register', [UserAuthController::class, 'registerUser']);     //[]
    Route::post('/user/login', [UserAuthController::class, 'loginUser']);           //[]
});
Route::middleware(['auth:sanctum', 'type.user'])->group( function () {
    Route::post('/user/logout', [UserAuthController::class, 'logoutUser']);     //[]
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


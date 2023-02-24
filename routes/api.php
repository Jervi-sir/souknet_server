<?php

use App\Http\Controllers\API\v1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/

Route::post('/user/register', [AuthController::class, 'registerUser']);
Route::post('/user/login', [AuthController::class, 'loginUser']);
Route::middleware(['auth:sanctum', 'type.user'])->group( function () {
    Route::post('/user/logout', [AuthController::class, 'logoutUser']);
});

/*
|--------------------------------------------------------------------------
| Business
|--------------------------------------------------------------------------
*/
Route::post('/business/register', [AuthController::class, 'registerBusiness']);
Route::post('/business/login', [AuthController::class, 'loginBusiness']);
Route::middleware(['auth:sanctum', 'type.business'])->group( function () {
    Route::post('/business/logout', [AuthController::class, 'logoutBusiness']);
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::post('/admin/register', [AuthController::class, 'registerAdmin']);
Route::post('/admin/login', [AuthController::class, 'loginAdmin']);
Route::middleware(['auth:sanctum', 'type.admin'])->group( function () {
    Route::post('/admin/logout', [AuthController::class, 'logoutAdmin']);
});


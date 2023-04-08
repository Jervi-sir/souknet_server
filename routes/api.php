<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\API\v1\ServiceController;
use App\Http\Controllers\API\v1\BusinessController;
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
| Company
|--------------------------------------------------------------------------
*/

Route::prefix('company')->middleware('guest:sanctum')->group(function () {
    Route::post('/register', [BusinessAuthController::class, 'registerCompany']);     //api[done]
    Route::post('/login', [BusinessAuthController::class, 'loginCompany']);           //api[done] 
});

Route::prefix('company')->middleware(['auth:sanctum', 'type.company'])->group(function () {
    Route::post('/logout', [BusinessAuthController::class, 'logoutCompany']);         //api[done]
    Route::post('/post-product', [BusinessController::class, 'postProduct']);         //api[done]             
    Route::post('/post-service', [BusinessController::class, 'postService']);         //api[done]
    Route::get('/getAllProducts', [BusinessController::class, 'getAllProducts']);
    Route::get('/getAllServices', [BusinessController::class, 'getAllServices']);
});
Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/get/{productId}', 'showProduct');   //api[done]       
    Route::get('/latest', 'latestProduct');          //api[done]
});
Route::prefix('service')->controller(ServiceController::class)->group(function () {
    Route::get('/get/{serviceId}', 'showService');   //api[done]       
    Route::get('/latest', 'latestService');          //api[done]
});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware('guest:sanctum')->group(function () {
    Route::post('/register', [UserAuthController::class, 'registerUser']);                 //api[done] 
    Route::post('/login', [UserAuthController::class, 'loginUser']);                       //api[done]    
});
Route::middleware(['auth:sanctum', 'type.user'])->group(function () {
    Route::post('/user/logout', [UserAuthController::class, 'logoutUser']);                     //api[done]
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::post('/admin/register', [AdminAuthController::class, 'registerAdmin']);  //api[]
Route::post('/admin/login', [AdminAuthController::class, 'loginAdmin']);        //api[]
Route::middleware(['auth:sanctum', 'type.admin'])->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logoutAdmin']);  //api[]
});

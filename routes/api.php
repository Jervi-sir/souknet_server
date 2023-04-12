<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\ProductController;
use App\Http\Controllers\API\v1\ServiceController;
use App\Http\Controllers\API\v1\BusinessController;
use App\Http\Controllers\API\v1\UserActionController;
use App\Http\Controllers\API\v1\Auth\UserAuthController;
use App\Http\Controllers\API\v1\Auth\AdminAuthController;
use App\Http\Controllers\API\v1\Auth\BusinessAuthController;
use App\Models\Endpoint;

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

Route::get('/test', function () {
    return response()->json('welcome to Souk mok');
});


Route::get('/update-endpoint-order', function () {
    $endpoints = Endpoint::orderBy('order')->get();
    foreach ($endpoints as $index => $endpoint) {
        $endpoint->order = $index + 1;
        $endpoint->save();
    }
    return response()->json('updated successfully');
});

Route::middleware(['auth:sanctum'])->post('/validate-token', function (Request $request) {
    $user = Auth::user();
    return response()->json($user);
});


Route::prefix('company')->middleware('guest:sanctum')->group(function () {
    Route::post('/register', [BusinessAuthController::class, 'registerCompany']);
    Route::post('/login', [BusinessAuthController::class, 'loginCompany']);
});
Route::prefix('company')->middleware(['auth:sanctum', 'type.company'])->group(function () {
    Route::post('/logout', [BusinessAuthController::class, 'logoutCompany']);
});

Route::prefix('auth/company')->middleware(['auth:sanctum', 'type.company'])->group(function () {
    Route::get('/add-product', [BusinessController::class, 'getPostProduct']);
    Route::post('/add-product', [BusinessController::class, 'postProduct']);
    Route::get('/product/{id}', [BusinessController::class, 'getThisProduct']);
    Route::delete('/product/{id}', [BusinessController::class, 'deleteThisProduct']);
    Route::post('/product/{id}/archive', [BusinessController::class, 'archiveThisProduct']);
    Route::post('/product/{id}/activate', [BusinessController::class, 'activateThisProduct']);


    Route::get('/add-service', [BusinessController::class, 'getPostService']);
    Route::post('/add-service', [BusinessController::class, 'postService']);
    Route::get('/service/{id}', [BusinessController::class, 'getThisService']);
    Route::delete('/service/{id}', [BusinessController::class, 'deleteThisService']);

    Route::get('/getAllMyProducts', [BusinessController::class, 'getAllMyProducts']);
    Route::get('/getAllMyServices', [BusinessController::class, 'getAllMyServices']);
});


/*
|--------------------------------------------------------------------------
| Both
|--------------------------------------------------------------------------
*/

Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/get/{id}', 'showProduct');
    Route::get('/latest', 'latestProduct');
    Route::get('/search/{keywords}', 'searchProduct');
});
Route::prefix('service')->controller(ServiceController::class)->group(function () {
    Route::get('/get/{id}', 'showService');
    Route::get('/latest', 'latestService');
    Route::get('/search/{keywords}', 'searchService');
});

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware('guest:sanctum')->group(function () {
    Route::post('/register', [UserAuthController::class, 'registerUser']);
    Route::post('/login', [UserAuthController::class, 'loginUser']);
});

Route::prefix('auth/user/')->middleware(['auth:sanctum', 'type.user'])->group(function () {
    Route::post('logout', [UserAuthController::class, 'logoutUser']);
    Route::post('company/{id}/follow', [UserActionController::class, 'followCompany']);
    Route::post('company/{id}/unfollow', [UserActionController::class, 'unFollowCompany']);
    Route::post('company/{id}/newsletter/follow', [UserActionController::class, 'followNewsletter']);
    Route::post('company/{id}/newsletter/unfollow', [UserActionController::class, 'unFollowNewsletter']);

    Route::post('product/{id}/favorite', [UserActionController::class, 'favoriteThisProduct']);
    Route::post('product/{id}/unfavorite', [UserActionController::class, 'unFavoriteThisProduct']);
    Route::post('product/{id}/add-review', [UserActionController::class, 'addReviewProduct']);
    Route::delete('product/{id}/remove-review/{review_id}', [UserActionController::class, 'removeReviewProduct']);
    Route::get('favorite/products', [UserActionController::class, 'getMyFavoriteProducts']);
    Route::get('favorite/products/{id}', [UserActionController::class, 'getThisFavoriteProduct']);

    Route::post('service/{id}/favorite', [UserActionController::class, 'favoriteThisService']);
    Route::post('service/{id}/unfavorite', [UserActionController::class, 'unFavoriteThisService']);
    Route::get('favorite/services', [UserActionController::class, 'getMyFavoriteServices']);
    Route::get('favorite/services/{id}', [UserActionController::class, 'getThisFavoriteService']);

    Route::post('product/{id}/order', [UserActionController::class, 'orderThisProduct']);
    Route::get('orders', [UserActionController::class, 'getMyOrders']);
    Route::get('orders/{id}', [UserActionController::class, 'getThisOrder']);

    Route::get('notifications', [UserActionController::class, 'getMyNotifications']);
    Route::get('notifications/{id}', [UserActionController::class, 'getThisNotifications']);

    Route::post('service/{id}/book', [UserActionController::class, 'bookService']);
    Route::post('service/{id}/unbook', [UserActionController::class, 'unBookService']);
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

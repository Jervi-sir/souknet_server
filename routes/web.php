<?php

use App\Models\Endpoint;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api-endpoints', function () {
    $endpoints = Endpoint::all()->groupBy('section');
    return view('endpoint', ['endpoints' => $endpoints]);
});

Route::post('endpoint/{id}/done', function ($id) {
    $endpoint = Endpoint::find($id);
    $endpoint->is_done = !$endpoint->is_done;
    $endpoint->save();
});

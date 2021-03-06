<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route definition...
// Route::get('/users/{user}', [UserController::class, 'show']);

// Laravel 6
// Route::post('/product', 'ProductController@post');

// Laravel 8
Route::get('/products', [ProductController::class, 'get']);

Route::get('/product/{id}', [ProductController::class, 'getById']);

Route::post('/product', [ProductController::class, 'post']);

Route::put('/product/{id}', [ProductController::class, 'put']);

Route::delete('/product/{id}', [ProductController::class, 'delete']);

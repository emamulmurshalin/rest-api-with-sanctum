<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Users
Route::post('/auth/register', [AuthController::class, 'register'])
    ->name('auth.register');
Route::post('/auth/login', [AuthController::class, 'login'])
    ->name('auth.login');

//Products
Route::get('/products', [ProductController::class, 'index'])
    ->name('product.list');
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('/product/search/{name}', [ProductController::class, 'search'])
    ->name('product.search');

Route::group(['middleware' => ['auth:sanctum']], function (){
    //Products
    Route::post('/products', [ProductController::class, 'store'])
        ->name('product.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->name('product.delete');

    //Users
    Route::post('/auth/logout', [AuthController::class, 'logout'])
        ->name('user.logout');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

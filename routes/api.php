<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//books
Route::post('/book/store',[BookController::class,'addBook']);
Route::get('/books',[BookController::class,'allBooks']);
Route::get('/book/{id}',[BookController::class,'showById']);
Route::put('/book/{id}',[BookController::class,'update']);

//categories
Route::post('/category/store',[CategoryController::class,'addCategory']);
Route::get('/categories',[CategoryController::class,'index']);

//auth
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

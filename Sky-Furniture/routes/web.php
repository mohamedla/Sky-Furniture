<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// temporary Routes
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/about', function () {
        return view('client/about');
    });
    Route::get('/contact', function () {
        return view('client/contact');
    });
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/signup', function () {
        return view('signup');
    });
    Route::get('/employee',function (){
        return view('employee/main');
    });


// Items Routes
Route::get('/item/{id}', [ItemController::class,'show']);
Route::get('/items',[ItemController::class,"index"]);
Route::get('/items/add',[ItemController::class,"create"]);
Route::post('/items/add',[ItemController::class,"store"]);
Route::get('/items/{id}',[ItemController::class,"edit"]);
Route::post('/items/{id}',[ItemController::class,"update"]);
Route::delete('/items/{id}',[ItemController::class,"destroy"]);

// Brands Routes
Route::get('/brands',[BrandController::class,"index"]);
Route::get('/brands/add',[BrandController::class,"create"]);
Route::post('/brands/add',[BrandController::class,"store"]);
Route::get('/brands/{id}',[BrandController::class,"show"]);
Route::post('/brands/{id}',[BrandController::class,"update"]);
Route::delete('/brands/{id}',[BrandController::class,"destroy"]);


// Category Routes
Route::get('/categories',[CategoryController::class,"index"]);
Route::get('/categories/add',[CategoryController::class,"create"]);
Route::post('/categories/add',[CategoryController::class,"store"]);
Route::get('/categories/{id}',[CategoryController::class,"show"]);
Route::post('/categories/{id}',[CategoryController::class,"update"]);
Route::delete('/categories/{id}',[CategoryController::class,"destroy"]);
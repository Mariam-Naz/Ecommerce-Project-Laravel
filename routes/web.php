<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
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

// Route::view('/' , 'welcome');

Route::match(['get','post'],'/',[IndexController::class, 'index']);
Route::match(['get', 'post'], '/admin', [AdminController::class, 'login']);
Route::get('/logout' , [AdminController::class,'logout']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>['auth']], function(){
    Route::match(['get', 'post'], '/admin/dashboard', [AdminController::class, 'dashboard']);

    //Category Routes
    Route::match(['get', 'post'], '/admin/add-category', [CategoryController::class, 'addCategory']);

    //Product Routes
    Route::match(['get', 'post'], '/admin/add-product', [ProductsController::class, 'addProduct']);
    Route::match(['get', 'post'], '/admin/view-products', [ProductsController::class, 'viewProducts']);
    Route::match(['get', 'post'], '/admin/view-product/{id}', [ProductsController::class, 'editProduct']);
    Route::match(['get', 'post'], '/admin/delete-product/{id}', [ProductsController::class, 'deleteProduct']);
});

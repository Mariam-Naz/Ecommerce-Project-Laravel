<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
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
Route::match(['get', 'post'], '/admin/dashboard', [AdminController::class, 'dashboard']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

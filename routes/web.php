<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
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
Route::get('/products/{id}', [ProductsController::class, 'products']);
Route::match(['get','post'],'/category/{id}' , [IndexController::class , 'category']);
Route::match(['get', 'post'], '/admin', [AdminController::class, 'login']);

//USER LOGIN REGISTER ROUTES
Route::match(['get', 'post'], '/login-register', [UserController::class, 'userloginRegister']);
Route::match(['get', 'post'], '/user-register', [UserController::class, 'userRegister']);
Route::match(['get', 'post'], '/user-login', [UserController::class, 'userLogin']);
Route::get('/user-logout', [UserController::class, 'userLogout']);
Route::get('/logout' , [AdminController::class,'logout']);
Route::match(['get', 'post'], '/change-password', [UserController::class, 'changePassword']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['frontLogin']], function () {
    Route::match(['get', 'post'], '/account', [UserController::class, 'userAccount']);
});

Route::group(['middleware'=>['auth']], function(){
    Route::match(['get', 'post'], '/admin/dashboard', [AdminController::class, 'dashboard']);

    //Category Routes
    Route::match(['get', 'post'], '/admin/add-category', [CategoryController::class, 'addCategory']);
    Route::match(['get', 'post'], '/admin/view-categories', [CategoryController::class, 'viewCategories']);
    Route::match(['get', 'post'], '/admin/view-category/{id}', [CategoryController::class, 'editCategory']);
    Route::match(['get', 'post'], '/admin/update-category', [CategoryController::class, 'updateStatus']);
    Route::match(['get', 'post'], '/admin/delete-category/{id}', [CategoryController::class, 'deleteCategory']);

    //Product Routes
    Route::match(['get', 'post'], '/admin/add-product', [ProductsController::class, 'addProduct']);
    Route::match(['get', 'post'], '/admin/view-products', [ProductsController::class, 'viewProducts']);
    Route::match(['get', 'post'], '/admin/view-product/{id}', [ProductsController::class, 'editProduct']);
    Route::match(['get', 'post'], '/admin/delete-product/{id}', [ProductsController::class, 'deleteProduct']);
    Route::match(['get', 'post'], '/admin/update-product', [ProductsController::class, 'updateStatus']);
    Route::match(['get', 'post'], '/admin/update-featured', [ProductsController::class, 'updateFeatured']);
    //Product Attributes
    Route::match(['get', 'post'], '/admin/add-attributes/{id}', [ProductsController::class, 'addAttributes']);
    Route::match(['get', 'post'], '/admin/delete-attribute/{id}', [ProductsController::class, 'deleteAttribute']);
    Route::match(['get', 'post'], '/admin/edit-attribute/{id}', [ProductsController::class, 'editAttribute']);
    Route::match(['get', 'post'], '/admin/add-images/{id}', [ProductsController::class, 'addImages']);

    //Banner Routes
    Route::match(['get', 'post'], '/admin/add-banner', [BannerController::class, 'addBanner']);
    Route::match(['get', 'post'], '/admin/view-banners', [BannerController::class, 'viewBanners']);
    Route::match(['get', 'post'], '/admin/view-banners/{id}', [BannerController::class, 'editBanner']);
    Route::match(['get', 'post'], '/admin/delete-banner/{id}', [BannerController::class, 'deleteBanner']);

    Route::match(['get', 'post'], '/admin/update-banner', [BannerController::class, 'updateStatus']);

});

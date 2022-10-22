<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\curlController;

use App\Http\Controllers\ProductController;



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
Route::group(
    ['middleware' => 'prevent-back-history'],
    function () {
Route::view('/','customer.login')->name('customer.login');


// Auth::routes();



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->name('admin.')->group(function(){
    
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','admin.login')->name('login');
        Route::view('/register','admin.register')->name('register'); 
        Route::post('/create',[AdminController::class,'create'])->name('create');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });
    
    Route::middleware(['auth:web'])->group(function(){
        Route::get('/curl',[curlController::class,'CurlCall'])->name('curl');
        Route::view('/home','admin.home')->name('home');
        Route::view('/test','admin.test')->name('test');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');

        Route::get('/products', [ProductController::class, 'showproducts'])->name('product_list');
        Route::get('/product/create', [ProductController::class, 'createProduct'])->name('products.create');
        Route::post('/product/create', [ProductController::class, 'saveProduct'])->name('products.store');
        Route::get('/product/edit/{id}', [ProductController::class, 'getProduct'])->name('products.edit');
        Route::put('/product/update/{id}', [ProductController::class, 'updateProduct'])->name('products.update');
        Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('products.destroy');

        Route::get('/customers', [CustomerController::class, 'showcustomers'])->name('customer_list');
    });
    
});


Route::view('/register','customer.register')->name('cust_register'); 
Route::post('/create',[CustomerController::class,'create'])->name('cust_create');
Route::post('/check_customer',[CustomerController::class,'check'])->name('cust_check');

Route::middleware(['auth:customer'])->group(function () {
    Route::view('/home', 'customer.home')->name('home');
    Route::post('logout', [CustomerController::class, 'logout'])->name('logout');
    Route::get('product-list', [CustomerController::class, 'products'])->name('cust_product_list');
    
});

});



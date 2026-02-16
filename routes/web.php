<?php

use App\Http\Controllers\Backend\AdminPagesController;
use App\Http\Controllers\Frontend\PagesController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/products', [PagesController::class, 'products'])->name('products');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminPagesController::class, 'index'])->name('admin.index');
    Route::get('product/create', [AdminPagesController::class, 'product_create'])->name('admin.product.create');
    Route::post('product/create', [AdminPagesController::class, 'product_store'])->name('admin.product.store');
});
<?php

use App\Http\Controllers\Backend\AdminPagesController;
use App\Http\Controllers\Backend\AdminProductController;
use App\Http\Controllers\Frontend\PagesController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/products', [PagesController::class, 'products'])->name('products');


Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminPagesController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => 'products'], function(){
        
    Route::get('/', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
    Route::post('/create', [AdminProductController::class, 'store'])->name('admin.product.store');
    Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::post('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
    });

});
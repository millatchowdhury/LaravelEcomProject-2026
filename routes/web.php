<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminBrandController;
use App\Http\Controllers\Backend\AdminCategoryController;
use App\Http\Controllers\Backend\AdminPagesController;
use App\Http\Controllers\Backend\AdminProductController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductController;



// Frontend 

// Frontend Pages Routes home, contact etc
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Route::group(['prefix' => 'products'], function(){

    // Frontend Product 
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/search', [ProductController::class, 'search'])->name('search');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('categories.show');
});







// Backend 
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminPagesController::class, 'index'])->name('admin.index');

    // Product Routes
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', [AdminProductController::class, 'index'])->name('admin.products');
        Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [AdminProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [AdminProductController::class, 'update'])->name('admin.product.update');
        Route::post('/delete/{id}', [AdminProductController::class, 'delete'])->name('admin.product.delete');
    });
    
    // Category Routes 
    Route::group(['prefix' => '/categories'], function(){
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.categories');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
    });
    
    // Brand Routes 
    Route::group(['prefix' => '/brand'], function(){
        Route::get('/', [AdminBrandController::class, 'index'])->name('admin.brands');
        Route::get('/create', [AdminBrandController::class, 'create'])->name('admin.brand.create');
        Route::post('/store', [AdminBrandController::class, 'store'])->name('admin.brand.store');
        Route::get('/edit/{id}', [AdminBrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('/update/{id}', [AdminBrandController::class, 'update'])->name('admin.brand.update');
        Route::post('/delete/{id}', [AdminBrandController::class, 'delete'])->name('admin.brand.delete');
    });

});



// User Authentication 

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

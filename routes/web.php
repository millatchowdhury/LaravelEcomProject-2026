<?php

use App\Http\Controllers\Frontend\PagesController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PagesController::class, 'homeIndex']);
Route::get('/contact', [PagesController::class, 'contactIndex']);



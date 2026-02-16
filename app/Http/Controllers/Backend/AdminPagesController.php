<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index(){
        return view('Backend.pages.home.index');
    }

    public function create(){
        return view('Backend.pages.product.create');
    }
}

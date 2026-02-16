<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('Frontend.pages.home.index');
    }

    public function contact(){
        return view('Frontend.pages.contact.contact');
    }
    
    public function products(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('Frontend.pages.product.index', compact('products'));
    }

}

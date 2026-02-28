<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('Frontend.pages.home.index', compact('products'));
    }

    public function contact(){
        return view('Frontend.pages.contact.contact');
    }

}

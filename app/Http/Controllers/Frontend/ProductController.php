<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('Frontend.pages.product.index', compact('products'));
    }

    public function show($slug){
        $product = Product::where('slug', $slug)->first();
        if(!is_null($product)){
            return view('Frontend.pages.product.show', compact('product'));
        }else{
            session()->flash('errors', 'Sorry !.. There is no product by this URL..');
            return redirect()->route('products');
        }
    }

    public function search(Request $request){
        $search = $request->search;

        $products = Product::orWhere('title', 'like', '%'.$search.'%')
                             ->orWhere('description', 'like', '%'.$search.'%')
                             ->orWhere('slug', 'like', '%'.$search.'%')
                             ->orWhere('price', 'like', '%'.$search.'%')
                             ->orWhere('quantity', 'like', '%'.$search.'%')
                             ->orderBy('id', 'desc')
                             ->paginate(9);

        return view('Frontend.pages.product.search', compact('search', 'products'));
    }
}

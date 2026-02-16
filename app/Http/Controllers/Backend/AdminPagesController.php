<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPagesController extends Controller
{
    public function index(){
        return view('Backend.pages.home.index');
    }

    public function product_create(){
        return view('Backend.pages.product.create');
    }

    public function product_store(Request $request){

    

        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->slug = Str::slug($request->title);
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;
        $product->save();

        return redirect()->route('admin.product.create');

    }
}

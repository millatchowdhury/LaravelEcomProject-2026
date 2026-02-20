<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Symfony\Component\Routing\Route;


class AdminProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->get();
        return view('Backend.pages.product.index', compact('products'));
    }

    public function create(){
        return view('Backend.pages.product.create');
    }


    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

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

        // Single Image insert for ProductImage Model
        // if($request->hasFile('product_image')){
        //     // image upload in laravel images folder 
        //     $image = $request->file('product_image');
        //     $img = time().'.'.$image->getClientOriginalExtension();
        //     $location = public_path('images/'.$img);
        //     $manager = new ImageManager(new Driver());
        //     $manager->read($image)->save($location);

        //     // image insert to database
        //     $product_image = new ProductImage;
        //     $product_image->product_id = $product->id;
        //     $product_image->image = $img;
        //     $product_image->save();
        // }



        // Multiple Image insert for ProductImage Model
        if(count($request->product_image) > 0){
            foreach($request->product_image as $image){

                // image upload in laravel images folder 
                // $img = time().'.'.$image->getClientOriginalExtension(); multi image ar somoy same name hoye jay
                $img = uniqid().'_'.$image->getClientOriginalName();
                $location = public_path('images/'.$img);
                $manager = new ImageManager(new Driver());
                $manager->read($image)->save($location);


                // image insert to database
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
        }

        return redirect()->route('admin.product.create');

    }

  

    public function edit($id){
        $products = Product::find($id);
        return view('Backend.pages.product.edit', compact('products'));
    }

    public function update(Request $request, $id){
        
        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        // $product->slug = Str::slug($request->title);
        // $product->category_id = 1;
        // $product->brand_id = 1;
        // $product->admin_id = 1;
        $product->save();

        // Single Image insert for ProductImage Model
        // if($request->hasFile('product_image')){
        //     // image upload in laravel images folder 
        //     $image = $request->file('product_image');
        //     $img = time().'.'.$image->getClientOriginalExtension();
        //     $location = public_path('images/'.$img);
        //     $manager = new ImageManager(new Driver());
        //     $manager->read($image)->save($location);

        //     // image insert to database
        //     $product_image = new ProductImage;
        //     $product_image->product_id = $product->id;
        //     $product_image->image = $img;
        //     $product_image->save();
        // }



        // Multiple Image insert for ProductImage Model
        // if(count($request->product_image) > 0){
        //     foreach($request->product_image as $image){

        //         // image upload in laravel images folder 
        //         // $img = time().'.'.$image->getClientOriginalExtension(); multi image ar somoy same name hoye jay
        //         $img = uniqid().'_'.$image->getClientOriginalName();
        //         $location = public_path('images/'.$img);
        //         $manager = new ImageManager(new Driver());
        //         $manager->read($image)->save($location);


        //         // image insert to database
        //         $product_image = new ProductImage;
        //         $product_image->product_id = $product->id;
        //         $product_image->image = $img;
        //         $product_image->save();
        //     }
        // }

        return redirect()->route('admin.products');
    }

    public function delete($id){
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }

        session()->flash('success', 'Product has deleted successfully !.. ');
        return back();
        
    }
}

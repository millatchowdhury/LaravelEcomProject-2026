<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class AdminBrandController extends Controller
{
     public function index(){
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('Backend.pages.brand.index', compact('brands'));
    }

    public function create(){
        
        return view('Backend.pages.brand.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
        [
            'name.required' => 'Please provide a brand name',
            'image.required' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension...'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        // Brand Image 
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = uniqid().'_'.$image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);

            // image intervenstion v2
            $manager = new ImageManager(new Driver());
            $manager->read($image)->save($location);
            $brand->image = $img;

        }

        $brand->save();

        session()->flush('success', 'A new Brand has added successfully !...');
        return redirect()->route('admin.brands');
    }

    public function edit($id){
        
        $brand = Brand::find($id);

        if(!is_null($brand)){
            return view('Backend.pages.brand.edit', compact('brand'));
        }else{
            return redirect()->route('admin.brands');
        }
        
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
        [
            'name.required' => 'Please provide a brand name',
            'image.required' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension...'
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;

        if($request->hasFile('image')){
            if(File::exists('images/brands/'.$brand->image)){
                File::delete('images/brands/'.$brand->image);
            }

            $image = $request->file('image');
            $img = uniqid().'_'.$image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);

            // image intervenstion v2
            $manager = new ImageManager(new Driver());
            $manager->read($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();

        session()->flash('success', 'Brand has updated successfully !.. ');
        return redirect()->route('admin.brands');

    }

    public function delete($id){

        $brand = Brand::find($id);

        if(!is_null($brand)){

            

            if(File::exists('images/categories/'.$brand->image)){
                File::delete('images/categories/'.$brand->image);
            }
            $brand->delete();
        }
        session()->flush('success', 'Brand has deleted successfully !...');
        return back();
    }
}

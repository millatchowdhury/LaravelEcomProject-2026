<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('Backend.pages.category.index', compact('categories'));
    }

    public function create(){
        $main_Categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('Backend.pages.category.create', compact('main_Categories'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
        [
            'name.required' => 'Please provide a category name',
            'image.required' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension...'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        // Category Image 
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = uniqid().'_'.$image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$img);

            // image intervenstion v2
            $manager = new ImageManager(new Driver());
            $manager->read($image)->save($location);
            $category->image = $img;

        }

        $category->save();

        session()->flush('success', 'A new Category has added successfully !...');
        return redirect()->route('admin.categories');
    }

    public function edit($id){
        $main_Categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $categoryById = Category::find($id);

        if(!is_null($categoryById)){
            return view('Backend.pages.category.edit', compact('main_Categories', 'categoryById'));
        }else{
            return redirect()->route('admin.categories');
        }
        
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
        [
            'name.required' => 'Please provide a category name',
            'image.required' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg extension...'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        if($request->hasFile('image')){
            if(File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }

            $image = $request->file('image');
            $img = uniqid().'_'.$image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$img);

            // image intervenstion v2
            $manager = new ImageManager(new Driver());
            $manager->read($image)->save($location);
            $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'Category has updated successfully !.. ');
        return redirect()->route('admin.categories');

    }

    public function delete($id){
        $category = Category::find($id);
        if(!is_null($category)){

            if($category->parent_id == NULL){
                
                $sub_categories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();
                
                    foreach($sub_categories as $sub_cat){
                        if(File::exists('images/categories/'.$sub_cat->image)){
                        File::delete('images/categories/'.$sub_cat->image);
                        }
                        $sub_cat->delete();
                    }
            }

            if(File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }
            $category->delete();
        }
        session()->flush('success', 'Category has deleted successfully !...');
        return back();
    }
}

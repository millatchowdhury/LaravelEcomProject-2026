<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index(){

    }

    public function show($id){
        $category = Category::find($id);

        if(!is_null($category)){
            return view('Frontend.pages.category.show', compact('category'));
        }else{
            session()->flush('errors', 'Sorry !! There is no category by this ID');
            return redirect('/');
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Symfony\Component\Routing\Route;

class AdminPagesController extends Controller
{
    public function index(){
        return view('Backend.pages.home.index');
    }


}

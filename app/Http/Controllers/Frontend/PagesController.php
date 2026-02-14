<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homeIndex(){
        return view('Frontend.pages.home.index');
    }

    public function contactIndex(){
        return view('Frontend.pages.contact.contact');
    }
    

}

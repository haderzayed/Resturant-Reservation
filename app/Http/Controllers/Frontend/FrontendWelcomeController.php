<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontendWelcomeController extends Controller
{
    public function index(){
        $menues=[];
        $specials=Category::where('name','special')->first();
        if(isset($specials)){
            $menues=$specials->menues()->paginate(8);
        }
        return view('welcome',compact('menues'));
    }
}

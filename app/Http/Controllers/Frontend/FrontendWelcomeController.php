<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Menue;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontendWelcomeController extends Controller
{
    public function index(){
        $menues=Menue::with('categories')->get();
        // $specials=Category::where('name','special')->first();
        // if(isset($specials)){
        //     $menues=$specials->menues()->paginate(8);
        // }
        $categories=Category::all();
        return view('welcome',compact('menues','categories'));
    }
}

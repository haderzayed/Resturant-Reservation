<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class FrontendCategoryController extends Controller
{
     public function index(){
        $categories=Category::all();

        return view('front.categories.index',compact('categories'));
     }

     public function show(Category $category){
        return view('front.categories.show',compact('category'));
     }
}

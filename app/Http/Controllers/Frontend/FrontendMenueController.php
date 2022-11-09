<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menue;

class FrontendMenueController extends Controller
{
    public function index(){

        $menues=Menue::all();

        return view('front.menues.index',compact('menues'));
    }

    public function show(Menue $menue){
        $menue->load('categories');
        return view('front.menues.show',compact('menue'));
     }
}

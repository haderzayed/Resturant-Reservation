<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menue;
use App\Models\Category;
use App\Http\Requests\MenueRequest;
use Illuminate\Support\Facades\Storage;

class MenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories_ids=$request->category_ids;
        if(isset($request->name) || isset($request->price) || isset($request->category_ids) ){
            $menues=Menue::where('name','LIKE', "%$request->name%")
                           ->where ('price','LIKE', "%$request->price%")
                           ->orWhereHas('categories', function ($query) use ($categories_ids) {
                            $query->whereIn('category_id', [$categories_ids]);
                        })->latest()->paginate(10);
        }else{
            $menues=Menue::latest()->paginate(10);
        }
        $categories=Category::pluck('name','id');
         return view('admin.menue.index',compact('menues','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $categories=Category::all();
        return view('admin.menue.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenueRequest $request)
    {
        $image=$request->file('image')->store('public/images/menues');

        $menue=Menue::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$image
        ]);
        $menue->categories()->attach($request->categories);
        toastr()->success('Menue Created Sucessfully');
        return redirect()->route('admin.menues.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menue $menue)
    {
         $categories=Category::all();
        return view('admin.menue.edite',compact('menue','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenueRequest $request,Menue $menue )
    {
        $image=$menue->image;
         if($request->hasFile('image')){
            Storage::delete($image);
            $image=$request->file('image')->store('public/images/menues');
         }
         $menue->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$image,
         ]);
         $menue->categories()->sync($request->categories);
         toastr()->success('Menue Updated Sucessfully');
        return redirect()->route('admin.menues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menue $menue)
    {
        Storage::delete($menue->image);
        $menue->delete();
        toastr()->success('menue deleted Sucessfully');
        return redirect()->route('admin.menues.index');
    }
}

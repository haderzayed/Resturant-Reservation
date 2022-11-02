<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Http\Requests\TableRequest;
use App\Enums\TableLocation;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->has('name') ||
            $request->has('location')||
            $request->has('status')||
            $request->has('guest_number')   ){
            $tables=Table::where('name','LIKE', "%$request->name%")
                           ->where ('location','LIKE', "%$request->location%")
                           ->where ('status','LIKE', "%$request->status%")
                           ->where ('guest_number','LIKE', "%$request->guest_number%")
                           ->latest()->paginate(10);
        }else{
            $tables=Table::latest()->paginate(10);
        }

        return view('admin.table.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableRequest $request)
    {
        $table=Table::create([
            'name'=>$request->name,
            'guest_number'=>$request->guest_number,
            'status'=>$request->status,
            'location'=>$request->location,
        ]);

        toastr()->success('Table Created Sucessfully');
        return redirect()->route('admin.tables.index');
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
    public function edit(Table $table)
    {
        return view('admin.table.edite',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Table $table)
    {
        $table->update($request->all());
        toastr()->success('Table Updated Sucessfully');
        return redirect()->route('admin.tables.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        toastr()->success('Table deleted Sucessfully');
        return redirect()->route('admin.tables.index');
    }
}

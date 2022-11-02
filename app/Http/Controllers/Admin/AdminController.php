<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function index(Request $request)
    {

        if(isset($request->name)){
            $admins=User::where('is_admin','1')
                          ->where('name','LIKE', "%$request->name%")
                          ->paginate(10);
        }else{
            $admins=User::where('is_admin','1')
                          ->paginate(10);
        }

        return view('admin.admin.index',compact('admins'));
    }
    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(AdminRequest $request)
    {

        $admin=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'is_admin'=>1,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10)
        ]);
        toastr()->success('Admin Created Sucessfully');
        return redirect()->route('admin.admins.index');
    }
    public function edit(User $admin)
    {
        return view('admin.admin.edite',compact('admin'));
    }

    public function update(AdminRequest $request, User $admin)
    {
         $admin->update( [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

         toastr()->success('Admin Updated Sucessfully');
         return redirect()->route('admin.admins.index');
    }
    public function destroy(User $admin)
    {
        $admin->delete();
        toastr()->success('Admin deleted Sucessfully');
        return redirect()->route('admin.admins.index');
    }

}

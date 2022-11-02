<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CustomerController extends Controller
{

    public function index(Request $request)
    {

        if(isset($request->name)){
            $customers=User::where('is_admin','0')
                          ->where('name','LIKE', "%$request->name%")
                          ->paginate(10);
        }else{
            $customers=User::where('is_admin','0')
                          ->paginate(10);
        }

        return view('admin.customer.index',compact('customers'));
    }
    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(AdminRequest $request)
    {

        $admin=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'is_admin'=>0,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10)
        ]);
        toastr()->success('Customer Created Sucessfully');
        return redirect()->route('admin.customers.index');
    }
    public function edit(User $customer)
    {
        return view('admin.customer.edite',compact('customer'));
    }

    public function update(AdminRequest $request, User $customer)
    {
         $customer->update( [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

         toastr()->success('Customer Updated Sucessfully');
         return redirect()->route('admin.customers.index');
    }
    public function destroy(User $customer)
    {
        $customer->delete();
        toastr()->success('Customer deleted Sucessfully');
        return redirect()->route('admin.customers.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){

        return view('auth.admin-login');
    }

    public function login(LoginRequest $request)
    {
        $user=User::whereEmail($request->email)->first();
        if($user->is_admin==1){
            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->to(route('admin.index'));
         }else{

            return back()->withErrors( "Sorry you can't login, you are not admin" );
         }

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->to(route('admin.login'));
    }
}

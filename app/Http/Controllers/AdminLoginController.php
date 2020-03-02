<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Admin;

class AdminLoginController extends Controller
{
    //
    public function ShowLoginForm(){
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->input();
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
                // echo "success"; die;
                Session::put('adminSession',$data['email']);
                return redirect('/admin/dashboard');
            }else{
                // echo "failed"; die;
                return redirect('/admin/login')->with('flash_message_error','Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }
}

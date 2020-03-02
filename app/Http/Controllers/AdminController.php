<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Admin;
use Auth;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest:admin');
    // }

    public function dashboard()
    {
        if(Session::has('adminSession')){

        }else{
            return redirect('/admin/admin_login')->with('flash_message_error','Please login to access');
        }
        return view('admin.dashboard');
    }

    public function settings()
    {
        if(Session::has('adminSession')){

        }else{
            return redirect('/admin/admin_login')->with('flash_message_error','Please login to access');
        }
        return view('admin.settings');
    }

    public function chkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = Admin::get()->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = Admin::where(['email'=> Auth::admin()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                Admin::where('admin')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin/login')->with('flash_message_success','logged out successfull');
    }
}

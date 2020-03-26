<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use App\User;
use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        // if(!Auth::user())
        //     return redirect(url('admin/login'));

        $this->middleware('auth');  

        $user = Auth::user();

        // if($user->UserRole_id != 1) {
        //     Auth::logout();

        //     return redirect('admin/login');
        // }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        // if(Session::has('adminSession')){

        // }else{
        //     return redirect('/admin/admin_login')->with('flash_message_error','Please login to access');
        // }
        return view('admin.settings');
    }

    public function chkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['UserRole_id' => '1'])->first();
        if(Hash::check($current_password,$check_password->Password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['UserEmail'=>Auth::user()->UserEmail])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->Password)){
                $Password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['Password'=>$Password]);
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

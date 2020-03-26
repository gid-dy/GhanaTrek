<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;


class AdminLoginController extends Controller
{
    //
    public function ShowLoginForm(){
        // $user = Auth::user();
        // if($user && $user->UserRole_id == 1)
        //     return redirect('admin/dashboard');

        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
       
        $data = $request->input();

    
        $user = User::where('UserEmail', $data['UserEmail'])->first();

        if ($user && Hash::check($data['Password'], $user->Password)){
            Auth::login($user);
          
            //admin
            if($user->UserRole_id == 1)
                return redirect(url('/admin/dashboard'));
            
            //user
            // return redirect(url('cart'));

        }else{
           //return back()->with('faikure', 'invalid credentials');
            return redirect('/admin/login')->with('flash_message_error','Invalid Username or Password');
        }

        return view('admin.admin_login');
    }
    


    public function logout(Request $request) {
        Auth::logout();

        return redirect(url('admin/login'))->with('flash_message_success','logged out successfully');
    }
}

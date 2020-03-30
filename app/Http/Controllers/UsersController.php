<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Country;
use Auth;
use Session;
use Hash;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     /**
      * Where to redirect users after registration.
      *
      * @var string
      */
     //protected $redirectTo = '/cart';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function showRegistrationForm(){
        return view('user.register');
    }

     public function register(Request $request)
     {
            $request->validate([
                'SurName' => 'required',
                'OtherNames' => 'required',
                'UserEmail' => 'required',
                'Mobile' => 'required',
                'Password' => 'required|confirmed'
            ]);

          //if($request->isMethod('post')){
             $data = $request->all();

             //check if user already exists
             $UserCount = User::where('UserEmail',$data['UserEmail'])->count();
             if($UserCount>0){
                 return redirect()->back()->with('flash_message_error', 'Email already exists!');
             }else{
                $user = new User;
                $user->SurName = $data['SurName'];
                $user->OtherNames = $data['OtherNames'];
                $user->UserEmail = $data['UserEmail'];
                $user->Mobile = $data['Mobile'];
                $user->UserRole_id = 2;
                $user->Password = bcrypt($data['Password']);
                $user->save();

                //Send Register Email
                // $UserEmail = $data['UserEmail'];
                // $messageData = ['UserEmail'=>$data['UserEmail'],'SurName'=>$data['SurName']];
                // Mail::send('emails.register', $messageData,function($message) use($UserEmail){
                //     $message->to($UserEmail)->subject('Registration with Ghanatrek');
                // });

                //Send Confirmation Email
                $UserEmail = $data['UserEmail'];
                $messageData = ['UserEmail'=>$data['UserEmail'], 'SurName'=>$data['SurName'], 'code'=>base64_encode($data['UserEmail'])];
                Mail::send('emails.confirmation', $messageData,function($message) use($UserEmail){
                    $message->to($UserEmail)->subject('E-mail confirmation');
                });
                return redirect()->back()->with('flash_message_success', 'Confirm your email to activate your account');

                Auth::login($user->fresh());

                return redirect('/cart');


            }
             //}

        }


     public function showLoginForm(Request $request){
         return view('user.login');
     }

     public function login(Request $request) {
        $request->validate([
            'UserEmail' => 'required|email',
            'Password' => 'required'
        ]);
        $data = $request->input();
        $user = User::where('UserEmail', $data['UserEmail'])->first();

        if ($user && Hash::check($data['Password'], $user->Password)){
            $users = User::where('UserEmail', $data['UserEmail'])->first();
            if($user->Status == 0){
                return redirect()->back()->with('flash_message_error','Your account is not activated!');
            }
            Auth::login($user);
            //if($user->Status == 1)

            if(!empty(Session::get('Sessionid'))){
                $Session_id = Session::get('Session_id');
                DB::table('carts')->where('Session_id', $Session_id)->update(['UserEmail', $data['UserEmail']]);
            }
            return redirect(url('/cart'));
        }else{
            return redirect()->back()->with('flash_message_error','Invalid Username or Password');
        }



     }


     public function confirmAccount($UserEmail){
         $UserEmail = base64_decode($UserEmail);
         $UserCount = User::where('UserEmail', $UserEmail)->count();
         if($UserCount>0){
             $userDetails=User::where('UserEmail', $UserEmail)->first();
             if($userDetails->Status == 1){
                 return redirect('/register')->with('flash_message_success','Your Email account is already activated.You can login in now');
             }else{
                 User::where('UserEmail', $UserEmail)->update(['Status'=>1]);

                 //Send Register Email
                $messageData = ['UserEmail'=>$UserEmail,'SurName'=>$userDetails->SurName];
                Mail::send('emails.welcome', $messageData,function($message) use($UserEmail){
                    $message->to($UserEmail)->subject('Welcome to Ghanatrek');
                });
                 return redirect('/register')->with('flash_message_success','Your Email account is activated.You can login in now');
             }
         }else{
             abort(404);
         }
     }

     public function account(Request $request)
     {

            $user_id = Auth::user()->id;
            $userDetails = User::find($user_id);
            $countries = Country::get();

            if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['SurName'])){
                return redirect()->back()->with('flash_message_error', 'Please enter your name');
            }

        if(empty($data['Address'])){
            $data['Address']='';
        }

        if(empty($data['State'])){
            $data['State']='';
        }

        if(empty($data['City'])){
            $data['City']='';
        }

        if(empty($data['OtherContact'])){
            $data['OtherContact']='';
        }


        if(empty($data['Country'])){
            $data['Country']='';
        }
        $user = User::find($user_id);
        $user->SurName = $data['SurName'];
        $user->OtherNames = $data['OtherNames'];
        $user->UserEmail = $data['UserEmail'];
        $user->Address = $data['Address'];
        $user->Country = $data['Country'];
        $user->City = $data['City'];
        $user->State = $data['State'];
        $user->Mobile = $data['Mobile'];
        $user->OtherContact = $data['OtherContact'];
        $user->save();
        return redirect()->back()->with('flash_message_success', 'Your account details has been successfully updated!');
        }
         return view('user.account')->with(compact('countries','userDetails'));

     }


     public function chkUserPassword(Request $request) {
         $data = $request->all();
         //echo "<pre>"; print_r($data); die;
         $current_password =$data['current_pwd'];
         $user_id = Auth::User()->id;
         $check_password = User::where('id',$user_id)->first();
         if(Hash::check($current_password, $check_password->Password)){
             echo "true"; die;
         }else{
             echo "false"; die;
         }

     }

     public function updatePassword(Request $request) {
        $data = $request->all();
        $old_pwd =User::where('id',Auth::User()->id)->first();
        $current_pwd = $data['current_pwd'];
        if(Hash::check($current_pwd,$old_pwd->Password)){
            //update password
            $new_pwd =bcrypt($data['new_pwd']);
            User::where('id',Auth::User()->id)->update(['password'=>$new_pwd]);
            return redirect()->back()->with('flash_message_success', 'Password updated Successfully!');
        }else{
            return redirect()->back()->with('flash_message_error', 'Current Password is incorrect!');
        }
     }

    public function logout(Request $request) {
        Auth::logout();
        Session::forget('Session_id');
        return redirect(url('/'));
    }

    public function viewUsers(){
        $users = User::get();
        return view('admin.users.view_users')->with(compact('users'));
    }
}


// if($request->isMethod('post')){
//     $data = $request->all();
//     //echo"<pre>"; print_r($data);die;

//     //check if user already exists
//     $UserCount = User::where('UserEmail',$data['UserEmail'])->count();
//     if($UserCount>0){
//         return redirect()->back()->with('flash_message_error', 'Email already exists!');
//     }else{
//         $user = new User;
//         $user->SurName = $data['SurName'];
//         $user->OtherNames = $data['OtherNames'];
//         $user->UserEmail = $data['UserEmail'];
//         $user->CountryId = $data['CountryId'];
//         $user->Address = $data['Address'];
//         $user->City = $data['City'];
//         $user->State = $data['State'];
//         $user->Mobile = $data['Mobile'];
//         $user->OtherPhoneContact = $data['OtherPhoneContact'];
//         $user->UserRoleId = 2;
//         $user->password = bcrypt($data['password']);
//         $user->save();
//         if(Auth::attempt(['UserEmail' =>$data['UserEmail'], 'password' => $data['password']])){
//             return redirect('cart');
//         }
//     }
// }
// $countries = Country::get();
// $countries_dropdown ="<option value='' selected disabled>Select</option>";
// foreach ($countries as $country) {
//     $countries_dropdown .= "<option value='".$country->CountryId."'>".$country->name."</option>";
// }

// return view('user.register')->with(compact('countries_dropdown'));
// }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Country;

class UserRegisterController extends Controller
{
    //
    protected $redirectTo = '/user/login';

    // public function __construct()
    // {
    //     $this->middleware('guest:web');
    // }

    public function showRegistrationForm(){
        return view('user.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'OtherNames' => ['required', 'string', 'max:255'],
            'SurName' => ['required', 'string', 'max:255'],
            'UserEmail' => ['required', 'string', 'UserEmail', 'max:255'],
            'CountryId' => ['required'],
            'Address' => ['required', 'string', 'max:255'],
            'City' => ['required', 'string', 'max:255'],
            'State' => ['required', 'string', 'max:255'],
            'Mobile'=>['required'],
            'OtherPhoneContact' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();


            //echo"<pre>"; print_r($data);die;
            $user = new User;
            $user->SurName = $data['SurName'];
            $user->OtherNames = $data['OtherNames'];
            $user->UserEmail = $data['UserEmail'];
            $user->CountryId = $data['CountryId'];
            $user->Address = $data['Address'];
            $user->City = $data['City'];
            $user->State = $data['State'];
            $user->Mobile = $data['Mobile'];

            $user->OtherPhoneContact = $data['OtherPhoneContact'];
            $user->UserRoleId = 2;
            //$user->CountryId = $data['CountryId'];
            $user->password = bcrypt($data['password']);
            $user->save();
            return redirect('user/login')->with('flash_message_success', 'User registered Successfully!');
    }
        $countries = Country::get();
        $countries_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($countries as $country) {
            $countries_dropdown .= "<option value='".$country->CountryId."'>".$country->name."</option>";
        }

        return view('user.register')->with(compact('countries_dropdown'));
    }
}

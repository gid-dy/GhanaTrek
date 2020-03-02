<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\UserRole;
use App\Country;
use App\Tourpackages;
use App\Tourpackagecategory;
use session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct()
    //  {
    //       $this->middleware('UserRole');
    //      $this->middleware('UserRole:USER')->except(['register','login','index','billing','under.cat','under_cat','details','about_us','cart','contact','help','privacy_policy','settings','wishlist','payment']);
    //  }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function showRegistrationForm(){
        return view('user.register');
    }

     public function index()
    {
        $tourpackagesAll = Tourpackages::get();


        $tourpackagecategory = Tourpackagecategory::with('tourcategories')->where($categoryId=null)->get();
        // $tourpackagecategory = json_decode(json_encode($tourpackagecategory));
        // echo "<pre>"; print_r($tourpackagecategory); die;
        // $tourpackagecategory_All ="";
        // foreach($tourpackagecategory as $cat){
        //     // echo $cat->CategoryName; echo"<br>";
        //     // echo $cat->Imageaddress; echo"<br>";
        //     // echo $cat->CategoryDescription; echo"<br>";
        //     $tourpackagecategory_All .="<div class='col-md-6 col-xs-12'>
        //                   <a href='".'under_cat'."' class='block-10'>
        //                     <img src='".'images/frontend_images/elmina_03.jpg'."' alt='portfolio image'/>
        //                     <div class='text'>
        //                         <h3 class='mt-0'>CategoryName</h3>
        //                         <p>>CategoryDescription</p>
        //                     </div>
        //                   </a>

        //             </div>";
        // }
        return view('index')->with(compact('tourpackagesAll','tourpackagecategory'));
    }

    public function under_cat()
    {

        return view('user.under_cat');
    }
    public function details()
    {

        return view('user.details');
    }

    public function about_us()
    {

        return view('user.about_us');
    }
    public function cart()
    {

        return view('user.cart');
    }
    public function billing()
    {

        return view('user.billing');
    }
    public function contact()
    {

        return view('user.contact');
    }
    public function help()
    {

        return view('user.help');
    }
    public function privacy_policy()
    {

        return view('user.privacy_policy');
    }
    public function settings()
    {

        return view('user.settings');
    }
    public function wishlist()
    {

        return view('user.wishlist');
    }
    public function payment()
    {

        return view('user.payment');
    }

    // public function login(Request $request)
    // {
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         if(Request::attempt(['UserEmail' =>$data['UserEmail'], 'password' => $data['password'] ])){
    //             // echo "success"; die;
    //             Session::put('userSession',$data['email']);
    //             return redirect('/login');
    //         }else{
    //             // echo "failed"; die;
    //             return redirect('/cart')->with('error','Invalid Username or Password');
    //         }
    //     }
    //     return view('user.login ');
    // }


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
            return redirect()->back()->with('flash_message_success', 'User registered Successfully!');
    }
        $countries = Country::get();
        $countries_dropdown ="<option value='' selected disabled>Select</option>";
        foreach ($countries as $country) {
            $countries_dropdown .= "<option value='".$country->CountryId."'>".$country->name."</option>";
        }

        return view('user.register')->with(compact('countries_dropdown'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function createUser()
    {
        //



}
}

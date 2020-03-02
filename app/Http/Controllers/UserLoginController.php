<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class UserLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $redirectTo = '/user/login';

    // public function __construct()
    // {
    //     $this->middleware('guest:web')->except('logout');
    // }


    public function showLoginForm()
    {
        return view('user.login');
    }

    // public function login()
    // {
    //     return view('admin.dashboard');
    // }

    public function login(Request $request){
        $this->validate($request,[
            'UserEmail'=>'required','password'=> ['required', 'string', 'min:8']]);
        $credentials = ['UserEmail'=>$request->UserEmail, 'password'=>$request->password];

        if(Auth::guard('web')->attempt($credentials, $request->filled('remember'))){
            return redirect()->intended(route('user/cart'));
        }
        return redirect()->back()->withInput($request->only('name','remember'));
    }

    protected function sendFailedLoginResponse(Request $request)
    {

        // throw ValidationException::withMessages([
        //     $this->username() => [trans('auth.failed')],
        // ]);

        $errors = [$this->username() => ['This email does not exist']];
        $user = User::where('UserEmail',$request->UserEmail)->first();
        if($user && ! \Hash::check($request->password,$user->password)){
            $errors = ['password' => ['Incorrect password']];
        }

        if($request->expectsJson()){
            return response()->json($errors,422);
        }

        return redirect()->back()
            ->withInput($request->only($this->UserEmail, 'remember'))
            ->withErrors($errors);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'UserEmail';
    }

    public function authenticated(Request $request, $user){
        return $user;
    }
}

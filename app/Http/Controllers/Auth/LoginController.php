<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use App\User;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $guard = 'web';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
 
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validate=$request->validate([
          'email'=>'required|email|string',
          'password'=>'required|min:6'
        ]);
        
        $user=User::where(['email'=>$request->email,'status'=>1])->first();
        if ($user) {
            if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
              return redirect()->route('index')->with('success','You successfully login!!');
            }
            else{
              return back()->with('error','please registration first');
            } 
            
        }else{
              if (!is_null($user)) {
                $user->notify(new VerifyRegistration($user));
                return back()->with('success','New Confirmation email sent you, please you can check');
              } 
              else{
                return back()->with('error','please registration first');
              } 
            }
    }
}

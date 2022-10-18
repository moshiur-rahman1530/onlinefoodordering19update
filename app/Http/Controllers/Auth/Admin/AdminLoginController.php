<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use App\Admin;

use Auth;

class AdminLoginController extends Controller
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
    protected $guard = 'admin';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    protected function guard(){
      return Auth::guard('admin');
  }
    
    public function showLoginForm()

    {

        return view('auth.admin.login');

    }
     

    /*public function adminlogin(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin=Admin::where('email',$request->email)->first();
            if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
                return redirect()->route('admin.index');
            }
            else{
              return back()->with('error','please registration first');
            }   
    }*/
    public function adminlogin(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
      ]);

      $checkEmail = Admin::where('email',$request->email)->first();
  
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // Log Him Now
        if($checkEmail){
           return redirect()->intended(route('admin.index'));
        }else {
          return back()->with('error', 'Invalid Login');
        }
       
      }else {
        return back()->with('error', 'Invalid Login');
      }
    }

  public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }



    
}

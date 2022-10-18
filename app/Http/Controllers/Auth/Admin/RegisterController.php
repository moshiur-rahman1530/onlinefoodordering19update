<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Division;
//use App\District;

use App\Notifications\VerifyRegistration;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = '/';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest');
  }

/**
 * @override
 * showRegistrationForm
 *
 * Display the registration form
 *
 * @return void view
 */
  public function showRegistrationForm()
  {
    $divisions = Division::orderBy('priority', 'asc')->get();
    //$districts = District::orderBy('name', 'asc')->get();

    return view('auth.register', compact('divisions'));
  }



  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
 

  

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  

  protected function register(Request $request)
  {
    $request->validate([
      'first_name' => 'required|min:4|max:30',
      'last_name' => 'nullable|min:4|max:15',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'division_id' => 'required|numeric',
      //'district_id' => 'required|numeric',
      'phone_no' => 'required|max:14|min:11|regex:/01[3-9]{1}[0-9]{2}[0-9]{6}$/',
      'permanent_address' => 'required|max:100|min:3',
    ],
        [        'first_name.required'=>'please provide valid first_name',
                'last_name.required'=>'please provide valid last_name',
                'email.required'=>'please provide valid email',
                'password.required'=>'please provide valid password',
                'division_id.required'=>'please provide valid division_id',
                //'district_id.required'=>'please provide valid district_id',
                'phone_no.required'=>'please provide valid phone_no',
                'permanent_address.required'=>'please provide valid permanent_address',
                

  ]);
    $user = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'username' =>str_slug($request->first_name.$request->last_name) ,
      'division_id' => $request->division_id,
      //'district_id' => $request->district_id,
      'phone_no' => $request->phone_no,
      'permanent_address' => $request->permanent_address,
      'ip_address' => request()->ip(),
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'remember_token'=> str_random(50),
      'status'=> 0,
    ]);

    $user->notify(new VerifyRegistration($user));
  return redirect('/')->with('success', 'A confirmation email has sent to you.. Please check and confirm your email');


  }
}

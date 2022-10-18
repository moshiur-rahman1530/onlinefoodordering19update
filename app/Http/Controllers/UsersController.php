<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\order;
use Auth;
use App\division;
use App\Account;
//use App\district;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        $user=Auth::user();
         $orders=order::orderBy('id','asc')->get();
        return view('pages.users.dashboard',compact('user','orders'));
        }

        public function view(){
            $user=Auth::user();
            $orders=order::orderBy('id','asc')->get();
            return view('pages.users.view',compact('user','orders'));
            }

            public function lastproduct(){
                $user=Auth::user();
                $orders=order::orderBy('created_at','desc')->get()->take(3);
                return view('pages.users.lastorder',compact('user','orders'));
                }
            
        
        public function profile(){
            $divisions=division::orderBy('priority','asc')->get();
            //$districts=district::orderBy('name','asc')->get();
            $user=Auth::user();
            return view('pages.users.profile',compact('user','divisions'));
            }   

            public function profileUpdate(Request $request){
                $user=Auth::user();
             $this->validate($request, [
                'first_name' => 'required|string|max:40|min:4',
                'last_name' => 'nullable|string|max:40|min:4',
                'username' => 'required|alpha_dash|max:100|min:6',
                'email' => 'required|string|email|max:60|unique:users,email,'.$user->id,
               
                'division_id' => 'required|numeric',
                //'district_id' => 'required|numeric',
                'phone_no' => 'required|max:14|unique:users,phone_no,'.$user->id,
                'permanent_address' => 'required|max:100',
            ]);
            
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->username=$request->username;
            $user->email=$request->email;
            $user->division_id=$request->division_id;
            //$user->district_id=$request->district_id;
            $user->phone_no=$request->phone_no;
            $user->permanent_address=$request->permanent_address;
            //$user->shipping_address=$request->shipping_address;
            if ($request->password !=NULL||$request->password != "") {
                $user->password=Hash::make($request->password);
            }
            $user->ip_address=$request->ip();
            $user->save();
            return back()->with('success','Update Successfull');
                }   


                public function accountcreate(Request $request){
                    $data=$request->validate([
                        'account_number'=>'required|digits:11|string|unique:accounts',
                        'pin'=>'digits:4|required',
                        'balance'=>'required'
                    ]);
                $check=Account::where('user_id',Auth::user()->id)->get();
                if($check->count()>0)
                {
                    return redirect()->back()->with('error',' Already you have an Account');
                }
                    $account=new Account();
                    $account->account_number=$data['account_number'];
                    $account->pin=$data['pin'];
                    $account->balance=$data['balance'];
                    $account->user_id=Auth::user()->id;
                    $account->save();

                    return redirect()->back()->with('success',' Account Created Successfully !!');
                    
                }
}

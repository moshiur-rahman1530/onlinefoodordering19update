<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

use App\User;
use App\division;
//use App\district;
use Image;
use Auth;
use App\Admin;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUs;
use App\Mail\ContactReply;
use App\sendMail;
use Illuminate\Support\Carbon;
use App\order;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin');
    }

    public function manageUsers(){
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pages.user.muser')->withUsers($users);
    }

    public function changeActiveStatus($id){
        $user = User::find($id);
        if ($user->is_active == 0) {
            $user->is_active = 1;
        }else {
            $user->is_active = 0;
        }
        $user->save();
        return redirect()->route('admin.manage_users');
    }


  public function singleUser($id){
      $user = User::where('id', $id)->first();
      if (!is_null($user)) {
        return view('admin.pages.user.view', compact('user'));
      }else {

        return redirect()->route('admin.manage_users')->with('errors', 'Sorry !! There is no user by this URL..');
      }
  
    } 

  public function delete($id){
 
    $user=user::find($id);
    if (!is_null($user)) {
   $user->delete();
    }
    return back()->with('success','User has deleted');
  }

 
  public function profile(){
    $user=Auth::user();
    return view('admin.layouts.profile',compact('user'));
    }
      public function showMessege( Request $request,$id){
            $contact=sendMail::find($id);
            //dd($contact);
            return view('admin.partial.viewmessage',compact('contact'));
        }
        public function contact_reply(Request $request)
        {
            $data=$request->all();
            $message=$data['reply'];
           // dd($message);
            $contact=sendMail::find($data['id']);
            Mail::to($contact->email)->send(new ContactReply($data));
            return back()->with('success', 'Massege send!');
        }
        public function search(Request $request)
        {
          $data=$request->start_date;
        
            $orders = order::whereDateBetween('created_at',(new Carbon)->subDays($data)->toDateString(),(new Carbon)->now()->toDateString() )->get();
        

          return view('admin.pages.orders.search_order',compact('orders'));
        }
}

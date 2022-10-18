<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\payment;
use Auth;
use App\order;
use App\User;
use App\Admin;
use App\cart;
use App\Mail\sentOrder;
use App\orderitem;
use App\Notifications\SubmitOrder;
use App\Account;
use App\division;
use App\Transaction;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $payments=payment::orderBy('priority','asc')->get();
        $user=Auth::User();
        if ($user) {
                return view('pages.checkouts', compact('payments','user'));
            }
            else{
                return redirect()->route('login');
            } 
    }*/

    public function index()
    {
   
      $divisions=division::orderBy('priority','asc')->get();
        $payments=payment::orderBy('priority','asc')->get();
                return view('pages.checkouts', compact('payments','divisions',));
          
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
      'name'=>'required',
      'phone_no'=>'required',
      'shipping_address'=>'required',
      'payment_method_id'=>'required',
      'total_price'=>'required',
  ],
[
        'name.required'=>'please provide valid name',
        'phone_no.required'=>'please provide valid phone_no',
        'shipping_address.required'=>'please provide valid shipping_address',
        'payment_method_id.required'=>'please provide valid payment_method_id',
]);
 $total=$request->total_price;

  $order=new order();
  if ($request->payment_method_id !='cash_in')
   {
      if ($request->transaction_id==null||empty($request->transaction_id))
       {
      
        return back()->with('error','please give transaction id for your payments');
      }
      else{
        $check_trx=Transaction::where('trx',$request->transaction_id)->first();
      if(!$check_trx)
      {
        return back()->with('error','Invalid Transaction id!!');
      }else{
        // $user_old=Account::where(['account_number'=>$request->transaction_id,  'user_id'=>Auth::user()->id])->value('balance');
        // // if($user_old<=$total)
        // // {
        // //   return back()->with('error','balance is low!!');
        // // }
        // $user_new=$user_old-$total;
        // Account::where(['account_number'=>$request->transaction_id,  'user_id'=>Auth::user()->id])->update(['balance'=>$user_new]);
        // $admin_old=Account::where(['account_number'=>'01628018234',  'user_id'=>2])->value('balance');
        // $admin_new=$admin_old+$total;
        //  Account::where(['account_number'=>'01628018234','user_id'=>2])->update(['balance'=>$admin_new]);


      }
    }
  }
  $order->name=$request->name;
  $order->email=$request->email;
  $order->phone_no=$request->phone_no;
  $order->shipping_address=$request->shipping_address;
  $order->message=$request->message;
  $order->ip_address=request()->ip();
  
  $order->transaction_id=$request->transaction_id;
  if (Auth::check()) {
      $order->user_id=Auth::id();
  }
  $order->payment_id=payment::where('sort_name',$request->payment_method_id)->first()->id;
  //dd($request->total);
  $order->total=$total;
  $order->save();
 
  foreach(cart::totalCarts() as $cart){
      $cart->order_id=$order->id;
      $cart->save();
  }
  
  $data = array(
    'name'      =>  $request->name,
    'phone_no'      =>  $request->phone_no,
    'shipping_address'      =>  $request->shipping_address,
    'payment_method_id'   =>   $request->payment_method_id,
    'transaction_id'   =>   $request->transaction_id,
    'order_id'=>$order->id,
);
 

    
      Mail::to('moshiurmanderpur@gmail.com')->send(new sentOrder($data));

//                     $user_id=$order->user_id;
//                     $user=Admin::where('id',$user_id)->first();

                           //dd($user);
                    $user=Admin::all();
                    //dd($user);
                    Notification::send($user, new SubmitOrder($data));

return redirect()->route('index')->with('success','sucessfully order submitted. Admin will notify you!!');
    }
    
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy()
    {
         return redirect()->route('carts');
    }
}

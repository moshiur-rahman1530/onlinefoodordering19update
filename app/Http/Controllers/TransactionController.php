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
use App\Notifications\SendTrx;
use App\Account;
use App\Transaction;

class TransactionController extends Controller
{
    public function payment(Request $request)
    {
    	$data=$request->validate([
             'to'=>'required',
             'from'=>'required',
             'amount'=>'required',
    	]);
    	$check_account=Account::where('account_number',$data['from'])->first();
    	if(!$check_account)
    	{
    		return redirect()->back()->with('error','Inalid account');
    	}
    	$transaction=new Transaction();
    	$transaction->to=$data['to'];
    	$transaction->from=$data['from'];
    	$transaction->amount=$data['amount'];
    	$transaction->trx=mt_rand();
    	$transaction->save();

        $user_old=Account::where('account_number',$data['from'])->value('balance');
        // if($user_old<=$total)
        // {
        //   return back()->with('error','balance is low!!');
        // }
        $user_new=$user_old-$data['amount'];
        Account::where(['account_number'=>$data['from'],  'user_id'=>Auth::user()->id])->update(['balance'=>$user_new]);
        $admin_old=Account::where('account_number','01628018234')->value('balance');
        $admin_new=$admin_old+$data['amount'];
         Account::where(['account_number'=>'01628018234','user_id'=>2])->update(['balance'=>$admin_new]);
       $user=User::where('id',Auth::user()->id)->first();
       Notification::send($user, new SendTrx($transaction)); 


         $admin=Admin::where('id',1)->first();
          Notification::send($admin, new SendTrx($transaction)); 
                    
      return redirect()->back()->with('success',$data['amount'].' Tk send transaction id '.$transaction->trx);
    }
}

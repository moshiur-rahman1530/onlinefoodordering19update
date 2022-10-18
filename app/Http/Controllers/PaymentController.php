<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use Auth;
use Image;
use File;
use App\Transaction;
use App\order;

class PaymentController extends Controller
{
    public function index(){
        $payments=payment::orderBy('id','desc')->get();
        return view('admin.pages.payments.index',compact('payments'));
        }
        public function __construct()
        {
            $this->middleware('auth:admin');
        }

        public function create(){
            
            return view('admin.pages.payments.create');
            }   

            public function store(Request $request){
             
                $this->validate($request,[
                    'name' => 'required',
                    'image'=>'nullable|image',
                    'priority' => 'required',
                    'sort_name' => 'required',
                    'no' => 'required',
                    'type' => 'required',              
               ],
            [
                'name.required'=>'please provide valid name',
                'image.image'=>'please provide valid image',
                'priority.required'=>'please provide valid priority',
                'sort_name.required'=>'please provide valid name',
                'no.required'=>'please provide valid no',
                'type.required'=>'please provide valid type',

            ]);
            $payment= new payment();
            $payment->name=$request->name;
            $payment->priority=$request->priority;
            $payment->sort_name=$request->sort_name;
            $payment->no=$request->no;
            $payment->type=$request->type;

           

            if (($request->image) > 0) {
                 $image=$request->file('image');
                        $img=time().'.'.$image->getClientOriginalExtension();
                        $location=public_path('images/payments/'.$img);
                        Image::make($image)->save($location);
                        $payment->image=$img;
                      
             }

            $payment->save();

            return redirect()->route('admin.payments')->with('success','New payment Add Successfully');
            
}
public function edit($id){
    
    $payment=payment::find($id);
    if (!is_null($payment)) {
        return view('admin.pages.payments.edit',compact('payment'));
         }
         else{
            return redirect()->route('admin.payments');
         } 
    }



    public function update(Request $request, $id){
             
        $this->validate($request,[
            'name' => 'required',
                    'image'=>'nullable|image',
                    'priority' => 'required',
                    'sort_name' => 'required',
                    'no' => 'required',
                    'type' => 'required',             
       ],
    [
        'name.required'=>'please provide valid name',
        'image.image'=>'please provide valid image',
        'priority.required'=>'please provide valid priority',
        'sort_name.required'=>'please provide valid name',
        'no.required'=>'please provide valid no',
        'type.required'=>'please provide valid type',
    ]);
    $payment= payment::find($id);
    $payment->name=$request->name;
    $payment->priority=$request->priority;
    $payment->sort_name=$request->sort_name;
    $payment->no=$request->no;
    $payment->type=$request->type;
    

    if (($request->image) > 0) {
        if (File::exists('images/payments/'.$payment->image)) {
           File::delete('images/payments/'.$payment->image);
        }
         $image=$request->file('image');
                $img=time().'.'.$image->getClientOriginalExtension();
                $location=public_path('images/payments/'.$img);
                Image::make($image)->save($location);
                $payment->image=$img;
              
     }

    $payment->save();

    return redirect()->route('admin.payments')->with('success','New payment update Successfully');
    
}


public function delete($id){
 
    $payment=payment::find($id);
    if (!is_null($payment)) {
        if ($payment->parent_id==null)

        if (File::exists('images/payments/'.$payment->image)) {
            File::delete('images/payments/'.$payment->image);
         }
   $payment->delete();
    }
   
      
    
    return back()->with('success','payment delete Successfully');
  }
  public function view_payment(Request $request)
  {
  	$transactions=Transaction::all();
    return view('admin.pages.payments.viewpayment',compact('transactions'));

  }
  public function view_cash(Request $request)
  {
  	$orders=order::where('payment_id',1)->get();
  return view('admin.pages.payments.cashon',compact('orders'));
  }

 
}
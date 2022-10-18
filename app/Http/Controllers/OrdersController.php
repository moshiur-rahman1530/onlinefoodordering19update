<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\order;
use App\user;
use App\admin;
use App\Product;
use App\Notifications\OrderConfirmed;
use App\Notifications\OrderCancelled;
use App\Mail\confirmOrder;
use PDF;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $orders=order::orderBy('id','asc')->get();
        
        return view('admin.pages.orders.index',compact('orders'));
        }

        public function show($id){
           $order=order::find($id);
           $order->is_seen_by_admin=Auth::user()->name;
           $order->save();
            return view('admin.pages.orders.show',compact('order'));
            }

            public function completed($id){
                $order=order::find($id);
                $user=User::where('id',$order->user_id)->first();
                if ($order->is_completed) {
                   $order->is_completed=0;

                     $data = array(
                        'id'      =>  $order->id,
                        'name'      =>  $order->name,
                        'shipping_address'      =>  $order->shipping_address,
                        'email'      =>  $order->email,
                        'order_id'=>$order->id,
                       
                    );
                   // Mail::to($data["email"], $data["name"])->send(new confirmOrder($data));
                    $user_id=$order->user_id;
                    $user=User::where('id',$user_id)->first();
                    //dd($user);
                 
                    Notification::send($user, new OrderCancelled($data));

                   $order->save();
                   
                 return redirect()->route('admin.orders')->with('error','Order cancel');
                }
                else {
                    $order->is_completed=Auth::user()->name;
                    $order->save();

                    $data = array(
                        'id'      =>  $order->id,
                        'name'      =>  $order->name,
                        'shipping_address'      =>  $order->shipping_address,
                        'email'      =>  $order->email,
                        'order_id'=>$order->id,
                       
                    );
                   // Mail::to($data["email"], $data["name"])->send(new confirmOrder($data));
                    $user_id=$order->user_id;
                    $user=User::where('id',$user_id)->first();
                    //dd($user);
                 
                    Notification::send($user, new OrderConfirmed($data));

                    return back()->with('success','Order Completed');
                 }
                 
                }

                public function chargeUpdate(Request $request, $id){
                    $order=order::find($id);
                     $order->shipping_charge=$request->shipping_charge;
                     $order->custom_discount=$request->custom_discount;
                     $order->save();
                   
                     return back()->with('success','Order Charge');
                    }

                    public function generateInvoice($id){
                        $order=order::find($id);
                        $pdf = PDF::loadView('admin.pages.orders.invoice', compact('order'));
                        return $pdf->stream('invoice.pdf');
                        return $pdf->download('invoice.pdf');
                        
                        }

                // public function paid($id){
                //     $order=order::find($id);
                //     if ($order->is_paid) {
                //        $order->is_paid=0;
                //        $order->save();
                   
                //        return back()->with('error','cancel payment');
                //     }
                //     else {
                //         $order->is_paid=1;
                //         $order->save();
                   
                //         return back()->with('success','Order Paid');
                //      }
                   
                //     }
                
                    public function delete($id){
 
                        $order=order::find($id);
                        if (!is_null($order)) {
                       $order->delete();
                        }
    
                         return redirect()->route('admin.orders')->with('error','order Delete Successfully');
                      }


                      public function saleOrder(){
                        $orders=order::orderBy('id','desc')->get();
                        //dd($orders);
                        $products=Product::orderBy('id','desc')->get();
                        return view('admin.pages.orders.allsales',compact('orders','products'));
                      }


                       public function allOrderproduct(){
                        $orders=order::orderBy('id','desc')->get();
        
        return view('admin.pages.orders.allorder',compact('orders'));
                       
                      }
       public function search(Request $request)
      {

        if ($request->input('from')<>'' && $request->input('to')<>'')
              {    
                  $start = date("Y-m-d",strtotime($request->input('from')));
                  $end = date("Y-m-d",strtotime($request->input('to')."+1 day"));
                  $orders=order::whereBetween('created_at',[$start,$end])->orderBy('id','desc')->get();
                  //dd($orders);
                  //dd($orders->carts->count());
                  return view('admin.pages.orders.searchresult',compact('orders'));
                }
            else  {
                return redirect()->back()->with('error','Please select valid date');
              }

      }
      public function search_all(Request $request)
      {
             
        if ($request->input('from')<>'' && $request->input('to')<>'')
              {    
                  $start = date("Y-m-d",strtotime($request->input('from')));
                  $end = date("Y-m-d",strtotime($request->input('to')."+1 day"));
                  $orders=order::whereBetween('created_at',[$start,$end])->orderBy('id','desc')->get();
                  //dd($orders);
                  //dd($orders->carts->count());
                  return view('admin.pages.orders.search_all',compact('orders'));
                }
            else  {
                return redirect()->back()->with('error','Please select valid date');
              }

      }
  }
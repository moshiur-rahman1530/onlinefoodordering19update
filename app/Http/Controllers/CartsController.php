<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\cart;
use App\order;
use App\Product;

class CartsController extends Controller
{
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orders=Order::all();
        $products=Product::where('status',1)->get();
        return view('pages.carts',compact('orders','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {$this->validate($request, [
  'product_id'=>'required'
    ],
    [
  'product_id.required'=>'please give a product'
    ]);
    // if (Auth::check()) {
    //     $cart=cart::where('user_id',Auth::id())
    //     ->where('product_id',$request->product_id)
    //     ->where('order_id', null)
       
    //     ->first();
    // }
    // else{
        $cart=cart::where('ip_address',request()->ip())
        ->where('product_id',$request->product_id)
        ->where('order_id', NULL)
     
        ->first();
        
   // }
   
    if (!is_null($cart)) {
        $cart->increment('product_quantity');
    }
    else{
        $cart=new cart();
        if (Auth::check()) {
           $cart->user_id=Auth::id();
        }
        $cart->ip_address=request()->ip();
        $cart->product_id=$request->product_id;
        $cart->save();
        
    }
        return back()->with('success','Successfully product add to the cart');
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
        $cart=cart::find($id);
        if (!is_null($cart)) {
            $quantity=$request->product_quantity;
            if($quantity<=0)
            {   $cart->delete();
                return redirect()->back()->with('error','Please give Positive number!');
            }
            $cart->product_quantity=$request->product_quantity;
            $cart->save();
        }else{
            return redirect()->route('carts');
        }
     
        return back()->with('success','Cart item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=cart::find($id);
        if (!is_null($cart)) {
            
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
     
        return back()->with('success','Cart item Deleted');
    }




    //new cart 

    /*public function add(Request $request){
        $product = Product::find($request->id);

        cart::add($product->id, $product->name, $product->price);

        return back()->with('success',"$product->name has successfully beed added to the shopping cart!");;
    }

    public function cart(){
        $params = [
            'title' => 'Shopping cart Checkout',
        ];

        return view('cart')->with($params);
    }

    public function clear(){
        cart::clear();

        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");;
    }*/
    
}

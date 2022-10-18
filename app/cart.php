<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class cart extends Model
{

    public $fillable=['user_id','ip_address','product_id','order_id','product_quantity'];
   
    public function user(){
        return $this->belongsTo(User::class);
    }
   
    public function product(){
        return $this->belongsTo(Product::class);
    }
public function order()
   {
       return $this->belongsTo(order::class);
   }
    
     public static function totalCarts()
     {
      //  if (Auth::check()) {
      //    $carts = cart::where('user_id', Auth::id())
      //    ->where('ip_address', request()->ip())
      //    ->where('order_id', null)
      //    ->get();
      //  }else {
         $carts = cart::where('ip_address', request()->ip())->where('order_id', null)->get();
      // }
       return $carts;
     }

      public static function totalorder(){
     
         $carts = cart::where('ip_address', request()->ip())->where('user_id',auth::user()->id)->get();
      
       return $carts;
     }
         public static function totalorderItems(){
      
          $carts=cart::totalorder();
       
          $total_item=0;
           foreach($carts as $cart) {
          $total_item+=$cart->product_quantity;
        
      }
      return $total_item;
    }



    public static function totalItems(){
      
      $carts=cart::totalCarts();
       $total_item=0;
      foreach($carts as $cart) {
          $total_item+=$cart->product_quantity;
        
      }
      return $total_item;
    }


    
}

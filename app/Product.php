<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public static function totalPrice()
   {
       $products=Product::where('status',1)->get();
       $total=0;
       foreach($products as $item)
       {
         $total+=($item->price*$item->quantity);
       }
    
       return $total;
   }
}

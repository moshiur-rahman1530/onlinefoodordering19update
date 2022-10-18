<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class order extends Model
{
    public $fillable=['user_id','ip_address','payment_id','name','phone_no','email','shipping_address','message','is_paid','is_completed','is_seen_by_admin',
'transaction_id','admin_name'
];

    public function user(){
    return $this->belongsTo(User::class);
}
  public function admin(){
    return $this->belongsTo(Admin::class);
}
public function carts(){
    return $this->hasMany(cart::class);
}
public function payment(){
    return $this->belongsTo(payment::class);
}
public function product(){
    return $this->hasMany(Product::class);
}
public function orders(){
    return $this->hasMany(Product::class);
}

public function scopeWhereDateBetween($query,$fieldName,$fromDate,$todate)
    {
        return $query->whereDate($fieldName,'>=',$fromDate)->whereDate($fieldName,'<=',$todate);
    }
    
}

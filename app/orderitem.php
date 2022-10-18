<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    public function order(){
        return $this->hasMany(order::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function carts(){
        return $this->hasMany(cart::class);
    }
}

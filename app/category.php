<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
   public function parent(){
       return $this->belongsTo(category::class,'parent_id');

   }

   public function products(){
    return $this->hasMany(product::class);
}

/*public static function ParentOrNotCategory($parent_id,$child_id){
    $categories=category::where('id',$child_id)->where('parent_id',$parent_id)->get();
    if (!is_null($categories)) {

        return true;
    }
    else
    return false;
}*/
}

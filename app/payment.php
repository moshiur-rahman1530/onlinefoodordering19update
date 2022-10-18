<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public $fillable=[
       'name',
       'image',
        'priority',
        'sort_name',
        'no',
        'type',
        ];

}

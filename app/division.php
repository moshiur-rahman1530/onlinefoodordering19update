<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class division extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

}

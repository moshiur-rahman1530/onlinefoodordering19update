<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guard = 'web';
   


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','username','division_id','phone_no','permanent_address','remember_token' ,'ip_address','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
    public function division()
    {
        return $this->belongsTo('App\division');
    }
      public function admin(){
    return $this->belongsTo(User::class);
}
}

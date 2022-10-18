<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sendMail extends Model
{
public $table = 'contactus';
public $fillable = ['name','email','message'];

public static function totalMessage()
{
$message=sendMail::all();
  $i=0;
foreach ($message as  $value) {
	$i++;
}
return $i;
}
public static function messages()
{
	$contact=sendMail::all();
	return $contact;
}



}

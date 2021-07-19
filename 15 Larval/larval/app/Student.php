<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

	protected $fillable = ['sname','standerd'];
    public  $timestamps = false;

}
 
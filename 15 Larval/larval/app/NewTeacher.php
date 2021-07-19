<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewTeacher extends Model
{
    //
    protected $fillable = ['sname','standerd'];
    public  $timestamps = false;

    protected $table="students";		// changing the name ot the table {means removing singular and plural concept }




}
 
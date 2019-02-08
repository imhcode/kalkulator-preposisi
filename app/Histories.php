<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    //
    protected $table = 'histories';

    function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
}

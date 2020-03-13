<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
   protected $hidden = ['created_at','updated_at'];

    public function product(){
    	return $this->belongsTo('App\Product')->where('status','1');
    }
}

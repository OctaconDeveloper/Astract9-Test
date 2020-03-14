<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['name','slug'];
    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function products(){
    	return $this->hasMany('App\Product')->where('status','1');
    }

}

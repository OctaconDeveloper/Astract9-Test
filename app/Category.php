<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{ 
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['name','slug'];
    public function brand(){
    	return $this->hasMany('App\Brand');
    }
    public function product(){
    	return $this->hasMany('App\Product')->where('status','1');
    }
    
}

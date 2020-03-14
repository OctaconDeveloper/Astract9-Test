<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $hidden = [
        'created_at','updated_at'
    ];

    protected $fillable = [
        'name', 'slug', 'phone','description','status',
    ];

    public function product(){
    	return $this->hasMany('App\Product')->where('status','1');
    }

    public function user(){
    	return $this->hasOne('App\User','id');
    }

    // public function product_count(){
    // 	return $this->
    // }
}

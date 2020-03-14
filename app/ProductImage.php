<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $fillable =['slug','file'];
    
    public function product(){
    	return $this->belongsTo('App\Product')->where('status','1');
    }
}

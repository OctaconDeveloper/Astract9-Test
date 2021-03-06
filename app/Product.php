<?php
  
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model
{

	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['name','slug','status','availabilty','amount','type','brand_id','vendor_id','description'];

    public function brand(){
    	return $this->belongsTo('App\Brand');
    }
    public function category(){
    	return $this->belongsTo('App\Category', 'category_id');
    }
    public function vendor(){
    	return $this->belongsTo('App\Vendor');
    }
    public function new(){
        $created = new Carbon($this->created_at);
        $now = Carbon::now();
        return ($created->diff($now)->days < 21) ? 'new' : 'old'; 
    }
    public function image(){
    	return $this->hasMany('App\ProductImage','product_id');
    }
    public function rating(){
    	return $this->hasMany('App\Rating');
    }
   
   
}
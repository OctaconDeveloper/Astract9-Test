<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Vendor;
use App\Category;
use App\Brand;
 
class ProductController extends Controller
{
	/*
	* Get Single product by slug
	*/
    public function index(){
    	$product = Product::with(array('image','brand','vendor','rating'))->where('slug',request()->slug)->first();
    	return view('product',compact('product',$product));
    }

    /*
    * Get list of vendor Product
    */
    public function vendor(){
    	$vendor = Vendor::where('slug',request()->slug)->with(array('product','product.image'))->first();
    	return view('vendor',compact('vendor',$vendor));  
    }

    /*
    * Get list of product by category and brand
    */
    public function category(){
    	$catID = $this->categoryID();
    	$brandID = $this->brandID();
    	$data = Brand::where('id',$brandID)->where('category_id',$catID)->with(array('category','products'))->first();

    	return view('category',compact('data',$data)); 
    }

    /*
    * Get category ID
    */
    private function categoryID(){
    	return Category::where('slug',request()->cat_slug)->first()->id;
    }

    /*
    * Get category ID
    */
    private function brandID(){
    	return Brand::where('slug',request()->brand_slug)->first()->id;
    }
}

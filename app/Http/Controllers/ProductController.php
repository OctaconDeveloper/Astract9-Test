<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Product;
use App\Vendor;
use App\Category;
use App\Brand;
use App\User;
 
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

    /*
    * Delete Product Admin callback
    */
    public function admin_product_delete(){
        Product::find(request()->product)->delete();
        return redirect('/products'); 
    }
 
    /*
    * Update Product Status
    */
    public function admin_product_update(){
        Product::find(request()->product)->update(['status'=> request()->id]);
        return redirect('/products'); 
    }
 
 
    /*
    * Get all vendors products
    */
    public function list(){
        $id=auth()->user()->id;
        $vendor = User::with('vendor')->find($id)->vendor;
        $vendor_id =  $vendor->id;
        $myproduct = Product::with(array('brand.category','brand'))->where('vendor_id',$vendor_id)->orderBy('id','DESC')->get();
        return view('vendor.products',compact('myproduct',$myproduct));
    }
    /*
    * Delete Product Vendor callback
    */
    public function vendor_product_delete(){
        Product::find(request()->product)->delete();
        return redirect('/user/all_products'); 
    }

    /*
    * Add new Product
    */
    public function store(){
        $this->validatestore();
        $id=auth()->user()->id;
        $vendor = User::with('vendor')->find($id)->vendor;
        $vendor_id =  $vendor->id;

        $product = Product::create([
            'name' => request()->name,
            'slug' => Str::slug(request()->name,'-'),
            'availabilty' => request()->availabilty,
            'amount' => request()->amount,
            'type' => request()->type,
            'brand_id' => request()->brand,
            'vendor_id' => $vendor_id,
            'description' => request()->description,
            'status' => '0'
        ]);
        // $dir = 'productImages/';
        foreach(request()->file('image') as $key => $file){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filepath = Str::slug(request()->name,'_').'_'.$key.'.'.$extension;
            Storage::disk('public')->put($filepath,  File::get($file));
            $product->image()->create([
                'slug' => Str::slug(request()->name.' '.$extension,'_'),
                'file' => $filepath 
            ]);
        } 

         $myproduct = Product::with(array('brand.category','brand'))->where('vendor_id',$vendor_id)->orderBy('id','DESC')->get();
        return view('vendor.products',compact('myproduct',$myproduct));
    }
 
    /*
    * Validate inputs for store
    */
    private function validatestore(){
        return request()->validate([
            'brand' => 'required|numeric',
            'category' => 'required|string',
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'availabilty' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|array',
            'image.*' => 'mimes:jpg,jpeg,png'
        ]);
    }

    /*
    * Vendor View Single Product
    */
    public function vendor_product_view(){
        if(Product::where('id',request()->product)->exists()){
            $product =  Product::with(array('image','brand','brand.category'))->find(request()->product);
             return view('vendor.view_product',compact('product',$product));
        }else{
            return view('errorPage');
        } 

    }
}
 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Brand;

class CategoryController extends Controller
{
    /*
    * Load all cataegory list
    */
    public function admin_category(){
    	$catgeory = Category::with('brand')->get();
  		return view('admin.category', compact('catgeory',$catgeory));
  	}

  	/*
  * Delete Category
  */
  public function admin_category_delete(){
    Category::find(request()->category)->delete();
    $catgeory = Category::with('brand')->get();
    return redirect('category')->with('catgeory',  $catgeory);
  }


  /*
  * Delete Brand
 */
  public function admin_brand_delete(){
    Brand::find(request()->brand)->delete();
    $catgeory = Category::with('brand')->get();
    return redirect('category')->with('catgeory',  $catgeory);
  }
 

  /* 
  * Add Category
  */
  public function store(){
  	$this->validatestore();
  	$newcategory = Category::create([
  		'name' => request()->name,
  		'slug' => Str::slug(request()->name,'-')
  	]);  	
  	$brands = explode(',',request()->brand_details);
  	foreach($brands as $key => $brand){
  		$newcategory->brand()->create([
  			'name' => $brand,
	  		'slug' => Str::slug($brand,'-')
  		]);
  	};
  	$catgeory = Category::with('brand')->get();
    return redirect('category')->with('catgeory',  $catgeory);
  }

/*
* Validate input for new category
*/
  private function validatestore(){
  	return request()->validate([
  		'name' => 'required|string|unique:categories',
  	]);
  }
} 

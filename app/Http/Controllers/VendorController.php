<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\User;
use App\Vendor;

class VendorController extends Controller
{
	/*
	* store new vendor
	*/
   public function store(){
   	$this->validatecreate();
   	$this->createUser();
   	$message='Account Created Successfully! Please Log In';
   	return view('/login')->with('message',$message);
   }

    /*
    * Login User 
    */
    public function index(){
    	$this->validatelogin();

    	if(Auth::attempt(request()->only('email', 'password'))){
        return auth()->user()->getRoleNames()[0] == 'admin' ? redirect('/dashboard') : redirect('/vendor') ;
    	}else{
    		$errors = 'Invalid login credentials';
    		return view('/login')->with('error',$errors);
    	}
    }
 
  /*
  *Admin Vendors List
  */
  public function admin_vendors(){
    $vendor = Vendor::with('user')->get();
  return view('admin.vendors', compact('vendor',$vendor));
  }

  /*
  * Update Vendor Status
  */
  public function admin_vendor_update(){
    Vendor::find(request()->vendor)->update(['status'=>request()->id]);
    $vendor = Vendor::with('user')->get();
    return redirect('vendors')->with('vendor',  $vendor);
  }
  
  /*
  * Delete Vendor
  */
  public function admin_vendor_delete(){
    Vendor::find(request()->vendor)->delete();
    $vendor = Vendor::with('user')->get();
    return redirect('vendors')->with('vendor',  $vendor);
  }

  /*
  * Logout
  */
  public function logout(){
    Auth::logout();
    return redirect('/login');
  }

















   /*
   * Validate New Vendor Details
   */
   private function validatecreate(){
   	return request()->validate([
   		'business_name' => 'required|string',
   		'email' => 'required|email|unique:users',
   		'password' => 'required|string|confirmed|min:8',
   		'business_phone' => 'required|numeric|min:11',
   		'business_description' => 'required|string|max:200',

   	]);
   }

    /*
   * Validate Login Details
   */
   private function validatelogin(){
   	return request()->validate([
   		'email' => 'required|email',
   		'password' => 'required|string',
   	]);
   }

   /*
   * Create Vendor
   */
    protected function createUser()
    { 
        $user = User::create([
            'name' => request()->business_name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
        ]);
        $user->assignRole('vendor');
       return $user->vendor()->create([
        	'name' => request()->business_name,
        	'slug' => Str::slug(request()->business_name,'-'),
        	'phone'=> request()->business_phone,
        	'description' => request()->business_description,
        	'status' => '1',
        ]);
    }
     
     
}

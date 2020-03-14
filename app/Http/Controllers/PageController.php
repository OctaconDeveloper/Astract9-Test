<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	/*
	* Index Page
	*/
    public function home(){
    	return view('welcome');
    }
    
    /*
    * Login Pae
    */
    public function login(){
    	return view('login');
    }

    /*
    * Admin Dashboard
    */
    public function admin_dashboard(){
    	return view('admin.dashboard');
    }

     

	/*
    * Admin Catgeory List
    */
    public function admin_category(){
    	return view('admin.category');
    }


    /*
    * Admin Product List
    */
    public function admin_products(){
    	return view('admin.products');
    }

    /*
    * Unathorized Page
    */
    public function unauthorized(){
    	return view('unauthorized');
    }




   
} 

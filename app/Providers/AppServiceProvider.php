<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Vendor;
use App\Product;
use App\Brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /** 
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $products = Product::with(array('brand','vendor','image'))->get();
        $category = Category::with('brand')->get();
        $vendors = Vendor::withCount('product')->get();
        $featured = Product::with('image')->where([['type','featured'],['status','1']])->get();
        $randomProducts1 = Product::where('status','1')->with('image')->inRandomOrder()->limit(3)->get();
        $randomProducts2 = Product::where('status','1')->with('image')->inRandomOrder()->limit(3)->get();
        $randomBrand = Brand::with('products')->inRandomOrder()->limit(7)->get();

        View::share('category', $category);
        View::share('vendors', $vendors);
        View::share('featured', $featured);
        View::share('randomProducts1', $randomProducts1);
        View::share('randomProducts2', $randomProducts2);
        View::share('randomBrand', $randomBrand);
        View::share('products', $products);
    }
}

<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Category::insert([
            [
                'name' => 'Men',
                'slug' =>   'men'
            ],
            [
                'name' => 'Children',
                'slug' =>   'children'
            ],
            [
                'name' => 'Women',
                'slug' =>   'women'
            ]
            
       ]);
    }
}

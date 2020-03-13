<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory('App\User', 10)->create();
        $users[0]->assignRole('admin');
        $users[1]->assignRole('vendor');
        $users[2]->assignRole('customer');
        $users[3]->assignRole('vendor');
        $users[4]->assignRole('customer');
        $users[5]->assignRole('vendor');
        $users[6]->assignRole('customer');
        $users[7]->assignRole('vendor');
        $users[8]->assignRole('customer');
    }
}

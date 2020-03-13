<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // this can be done as separate statements
        $admin = Role::create(['name' => 'admin']);
        $vendor = Role::create(['name' => 'vendor']);
        $customer = Role::create(['name' => 'customer']);

        $admin->givePermissionTo(Permission::all());
    }
}

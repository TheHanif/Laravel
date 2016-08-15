<?php

use App\Role;
use Illuminate\Database\Seeder;

class SeederRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = new Role();
        $useradmin->name = 'sa';
        $useradmin->display_name = 'Super Admin';
        $useradmin->description = 'Can administrate anything';
        $useradmin->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin User';
        $admin->description = 'Can manage few things';
        $admin->save();

    }
}

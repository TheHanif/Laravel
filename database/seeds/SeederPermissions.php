<?php
use App\Permission;
use Illuminate\Database\Seeder;

class SeederPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUser = new Permission();
        $createUser->name = 'create-user';
        $createUser->display_name = 'Create User';
        $createUser->description = 'Create New user';
        $createUser->save();

        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit User';
        $editUser->description = 'Edit user';
        $editUser->save();

        $deleteUser = new Permission();
        $deleteUser->name = 'delete-user';
        $deleteUser->display_name = 'Delete User';
        $deleteUser->description = 'Delete user';
        $deleteUser->save();

        $viewDashboard = new Permission();
        $viewDashboard->name = 'view-dashboard';
        $viewDashboard->display_name = 'View Dashboard';
        $viewDashboard->description = 'View Dashboad';
        $viewDashboard->save();
    }
}

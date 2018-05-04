<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $admin = new Role();
        $admin->name  = 'admin';
        $admin->display_name  = 'Admin';
        $admin->description='Admin';
        $admin->save();

        $user = new Role();
        $user->name  = 'user';
        $user->display_name  = 'user';
        $user->description='user';
        $user->save();
    }
}

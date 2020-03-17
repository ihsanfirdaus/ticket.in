<?php

use Illuminate\Database\Seeder;
use App\User; 
use App\Role;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        $admin = new User();
        $admin->name = "Admin Ticket.in";
        $admin->email = "admin@ticket.in";
        $admin->password = bcrypt('admin123');
        $admin->save();
        $admin->attachRole($adminRole);
    }
}

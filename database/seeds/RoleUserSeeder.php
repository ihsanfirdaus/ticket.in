<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Ticket.in',
            'email' => 'admin@ticket.in',
            'is_admin' => 1,
            'password' => Hash::make('admin123'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Owner Ticket.in',
            'email' => 'owner@ticket.in',
            'is_admin' => 9,
            'password' => Hash::make('owner123'),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'User Faker',
            'email' => 'userfaker@gmail.com',
            'password' => Hash::make('user123'),
        ]);
    }
}

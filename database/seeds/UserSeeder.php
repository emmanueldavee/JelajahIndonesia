<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'user1',
                'email' => 'user1@email.com',
                'phone' => '0812345678',
                'role' => 'user',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'user2',
                'email' => 'user2@email.com',
                'phone' => '0812345678',
                'role' => 'user',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'admin1',
                'email' => 'admin1@email.com',
                'phone' => '0812345678',
                'role' => 'admin',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@email.com',
                'phone' => '0812345678',
                'role' => 'admin',
                'password' => bcrypt('password')
            ]
        ]);
    }
}

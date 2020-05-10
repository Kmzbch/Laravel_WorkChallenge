<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // admin user
        \App\User::create([
            'name' => 'Alice Arnest',
            'email' => 'alice@example.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        // user
        \App\User::create([
            'name' => 'Bob Bronson',
            'email' => 'bob@example.com',
            'password' => bcrypt('user'),
            'role' => 'user'
        ]);
    }
}

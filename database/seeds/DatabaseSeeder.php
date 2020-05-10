<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // call table seeders
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        $this->call(LabsTableSeeder::class);
    }
}

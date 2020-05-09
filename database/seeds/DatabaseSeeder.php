<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // call table seeder for labs
        $this->call(LabsTableSeeder::class);
    }
}

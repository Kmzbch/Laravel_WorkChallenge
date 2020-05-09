<?php

use Illuminate\Database\Seeder;

class LabsTableSeeder extends Seeder
{
    public function run()
    {
        // insert mock records
        DB::table('labs')->insert([
            [
                'name' => 'Open Source Innovation in Artificial Intelligence',
                'location' => 'San Francisco, CA, USA',
                'created_at' => date_create(),

            ],
            [
                'name' => 'Prepr Career Lab',
                'location' => '473 Morden Road, Oakville ON',
                'created_at' => date_create(),
            ],
            [
                'name' => 'Security, Complience & Project Health',
                'location' => 'San Francisco, CA, USA',
                'created_at' => date_create(),
            ],
        ]);
        //
    }
}

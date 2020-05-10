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
            [
                'name' => 'Code and Response with The Linux Foundation',
                'location' => '941 Progress Ave',
                'created_at' => date_create(),
            ],
            [
                'name' => 'Code and Response with The Linux Foundation',
                'location' => '22 Front St',
                'created_at' => date_create(),
            ],
            [
                'name' => 'Beyond Covid-19 Lab',
                'location' => '100 Queen St W',
                'created_at' => date_create(),
            ],

        ]);
        //
    }
}

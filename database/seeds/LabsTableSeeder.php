<?php

use Illuminate\Database\Seeder;

class LabsTableSeeder extends Seeder
{
    // generate mock records
    public function run()
    {
        DB::table('labs')->insert([
            [
                'name' => 'Open Source Innovation in Artificial Intelligence',
                'location' => '800 Bay St, Toronto, ON',
                'created_at' => date_create(),
            ],
            [
                'name' => 'Prepr Career Lab',
                'location' => '473 Morden Road, Oakville ON',
                'created_at' => date_create(),
            ],
            [
                'name' => 'Security, Complience & Project Health',
                'location' => '446 Summerhill Ave, Toronto, ON',
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
    }
}

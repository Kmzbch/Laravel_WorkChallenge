<?php

use Illuminate\Database\Seeder;

class LabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
                'location' => 'Oakville, ON, Canada',
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

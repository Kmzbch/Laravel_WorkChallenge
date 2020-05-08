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
        DB::table('labs')->insert([
            [
                'name' => 'Richmond Lab',
                'location' => 'Address 1',
                'created_at' => date_create(),

            ],
            [
                'name' => 'Scarborough Lab',
                'location' => 'Address 2',
                'created_at' => date_create(),
            ],
            [
                'name' => 'Front Lab',
                'location' => 'Address 3',
                'created_at' => date_create(),
            ],
        ]);
        //
    }
}

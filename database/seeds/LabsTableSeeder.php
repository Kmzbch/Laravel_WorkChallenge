<?php

use Illuminate\Database\Seeder;

class LabsTableSeeder extends Seeder
{
    // generate mock records
    // https://preprlabs.org/labs
    public function run()
    {
        \App\Lab::create(
            [
                'name' => 'Open Source Innovation in Artificial Intelligence',
                'location' => '800 Bay St, Toronto, ON',
                'description' => 'Our mission is to build and support an open AI community, and drive open source innovation in the AI, ML and DL domains by enabling collaboration and the creation of new opportunities for all the members of the community.',
                'created_at' => date_create(),
            ],
        );
        \App\Lab::create(
            [
                'name' => 'Prepr Career Lab',
                'location' => '473 Morden Road, Oakville ON',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in viverra eros. Phasellus elementum, lorem id sagittis rutrum, sem libero accumsan nulla, vitae congue diam augue at nulla. Donec condimentum sollicitudin vestibulum.',
                'created_at' => date_create(),
            ],
        );
        \App\Lab::create(
            [
                'name' => 'Security, Complience & Project Health',
                'location' => '446 Summerhill Ave, Toronto, ON',
                'description' => 'Today and for the foreseeable future, the open source software ecosystem forms a significant element in the basic software infrastructure for the world’s civil systems, including financial, energy, safety, and consumer devices. ',
                'created_at' => date_create(),
            ],
        );
        \App\Lab::create(
            [
                'name' => 'Code and Response with The Linux Foundation',
                'location' => '941 Progress Ave',
                'description' => 'Creating and deploying open source technologies to tackle some of the world’s greatest challenges.',
                'created_at' => date_create(),
            ],
        );
        \App\Lab::create(
            [
                'name' => 'Beyond Covid-19 Education Lab',
                'location' => '100 Queen St W',
                'description' => 'This is the official lab for the Beyond Covid-19 Education Challenge. Meet prospective team members, engage in discussions and stay tuned for new resources. Join to stay connected.',
                'created_at' => date_create(),
            ],

        );
    }
}

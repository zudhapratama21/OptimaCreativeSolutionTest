<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    
    public function run()
    {
        Service::create([
            'name' => 'Website Development',
            'is_active' => true
        ]);

        Service::create([
            'name' => 'Mobile Applications Development',
            'is_active' => true
        ]);

        Service::create([
            'name' => 'AR/VR',
            'is_active' => true
        ]);

        Service::create([
            'name' => 'Game Development',
            'is_active' => true
        ]);

        Service::create([
            'name' => 'Internet Of Things',
            'is_active' => true
        ]);

        Service::create([
            'name' => 'Virtual Event',
            'is_active' => true
        ]);


    }
}

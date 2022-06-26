<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        User::create([
            'name' => 'Intive Studio',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('intive123')
        ]);
    }
}

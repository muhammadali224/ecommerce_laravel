<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456789'),
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'user_name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'domain' => 'Computer Science',
            'team' => 'AI Team',
            'specialty' => 'doctorant',
        ]);
    }
}
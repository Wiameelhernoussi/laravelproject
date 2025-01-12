<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder; // Assurez-vous d'importer le UserSeeder
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Utiliser la factory pour créer 10 utilisateurs aléatoires
        User::factory(10)->create();

        // Appelle le UserSeeder pour insérer un utilisateur spécifique
        $this->call(UserSeeder::class);
    }
}


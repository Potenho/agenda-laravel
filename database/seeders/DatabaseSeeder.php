<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'username' => 'UsuarioTeste',
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
        ]);

        Category::create([
            'name' => 'Comunidade da Pizza',
            'description' => 'Quem prefere hamburguer não é gente.',
            'image' => config('images.category_path').'1.png',
        ]);

        Category::create([
            'name' => 'Comunidade da Torta',
            'description' => 'Não, não temos retas por aqui.',
            'image' => config('images.category_path').'2.png',
        ]);



    }
}

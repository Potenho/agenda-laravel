<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
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

        foreach (config('defaultCategories') as $category) {
            Category::create([
                'name' => $category['name'],
                'description' => $category['description'],
                'image' => $category['image'],
                'pfpColor' => $category['pfpColor'],
                'backgroundColor' => $category['backgroundColor'],
            ]);
        }

    }
}

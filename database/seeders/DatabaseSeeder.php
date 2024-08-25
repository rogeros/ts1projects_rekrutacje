<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'Test User 1',
            'email' => 'user_1@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pass_1'),
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'Test User 2',
            'email' => 'user_2@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pass_2'),
        ]);

        User::factory()->create([
            'id' => 3,
            'name' => 'Test User 3',
            'email' => 'user_3@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pass_3'),
        ]);

        Article::factory(77)->create();
    }
}

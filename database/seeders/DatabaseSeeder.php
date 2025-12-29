<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cast;
use App\Models\Genre;
use Database\Factories\GenreFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
            $this->call([
                CastSeeder::class,
                GenreSeeder::class,
                StatusSeeder::class,
                // MovieSeeder::class,
            ]);
        \App\Models\Movie::factory(10)->create();

        \App\Models\Carousel::factory(5)->create();


            // $genre = Genre::where('id', 'name');
            // $casts = Cast::where('id', 'genre');

    }
}

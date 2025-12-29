<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;
use App\Models\Genre;
use App\Models\Cast;
use Illuminate\Support\Testing\Fakes\Fake;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genre = Genre::inRandomOrder()->take(2)->pluck('genre');
        $cast = Cast::inRandomOrder()->take(2)->pluck('name');

        $string_genre = collect($genre)->implode(',');
        $string_cast = collect($cast)->implode(',');

        
        \App\Models\Movie::factory(10)->create([
            'name' => fake()->name(),
            'isPublished' => 1,
            'genre' => $string_genre,
            'image' => fake()->image('public/movieimages', 250 ,375),
            'carousel_image' => fake()->image('public/carouselimages', 1140 ,500, null, false),
            'director' => fake()->name(),
            'duration' => fake()->time(),
            'casts' => $string_cast,
            'details' => fake()->realTextBetween(50,100),
            'released_date' => fake()->date(),
        ]);
    }
}

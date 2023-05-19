<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cast;
use App\Models\Genre;
use App\Models\Status;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $genre = Genre::inRandomOrder()->take(2)->pluck('genre');
        $cast = Cast::inRandomOrder()->take(2)->pluck('name');
        $status = Status::inRandomOrder()->take(1)->pluck('status');
        
          
        $string_genre = collect($genre)->implode(',');
        $string_cast = collect($cast)->implode(',');
        $status_required = collect($status)->implode(',');

        return [
           'name' => fake()->name(),
            'isPublished' => 1,
            'genre' => $string_genre,
            'image' => fake()->image('public/movieimages', 250 ,375, null, false),
            'carousel_image' => fake()->image('public/carouselimages', 1140 ,500, null, false),
            'director' => fake()->name(),
            'duration' => fake()->time(),
            'casts' => $string_cast,
            'status' => $status_required,
            'details' => fake()->realTextBetween(50,100),
            'released_date' => fake()->dateTimeBetween('-20 days', '+ 15days'),
        ];
    }
}

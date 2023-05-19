<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carousel>
 */
class CarouselFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movie = Movie::inRandomOrder()->take(1)->pluck('id');
        $string_movie = collect($movie)->implode(',');

        return 
           [ 'movie_id' => $string_movie]
        ;
    }
}

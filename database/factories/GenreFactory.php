<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            $genres = [
                // ['genre' => 'Action' ],
                // ['genre' => 'Adventure' ],
                // ['genre' => 'Drama' ],
                // ['genre' => 'Fantasy' ],
                // ['genre' => 'Science Fiction' ],
                // ['genre' => 'Crime' ],
                // ['genre' => 'Thriller' ],
                // ['genre' => 'Romance' ],
                'genre' => fake()->name(),
            ],
        ];
       
    }
}

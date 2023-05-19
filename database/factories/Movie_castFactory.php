<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\Cast;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie_cast>
 */
class Movie_castFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $movies = Movie::all();

        // $mv = Movie::all();
        // foreach ($mv as $mvv) {
        //     $cast = $mvv::pluck('casts');
        //     // foreach ($cast as $cast) {
        //         dd($cast[1]);
        //     // }
        // }
        
        
        foreach ($movies as $movie) {
            $movieCast = $movie::pluck('casts');
            // $casts = $movieCast->casts;
            foreach ($movieCast as $movieCast) {
                $expCast = explode(',', $movieCast);
                // dd($expCast);

                

                    // dd($CastId[0]);

                    foreach ($expCast as $cast) {
                        $CastId = Cast::where('name', $cast)->pluck('id');
                        $a = collect($CastId)->implode(' ');
                    return [
                            // dd($cast);
                        'movie_id' => $movie->id,
                        'casts_id' => $a,
                        
                    ];
                }
            }
        }
    }
}

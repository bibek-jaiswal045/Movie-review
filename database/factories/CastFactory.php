<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cast;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cast>
 */
class CastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            $casts = [
                // ['name' => 'Yash'],
                // ['name' => 'Srinidhi Shetty'],
                // ['name' => 'Achyuth Kumar'],
                // ['name' => 'Archana Jois'],
                // ['name' => 'Sigourney Weaver'],
                // ['name' => 'Stephen Lang'],
                // ['name' => 'David Van Horn'],
                // ['name' => 'Luke Hawker'],
                // ['name' => 'Lucy Briant'],
                // ['name' => 'Raveena Tandon'],
                // ['name' => 'Sanjay Dutt'],
                // ['name' => 'Prakash Raj'],
                // ['name' => 'Ayyappa P. Sharma'],
                // ['name' => 'N.T. Rama Rao'],
                // ['name' => 'Ram Charan'],
                // ['name' => 'Olivia Morris'],
                // ['name' => 'Ray Stevenson'],
                // ['name' => 'Alison Doody'],
                // ['name' => 'Abhisek Bachchan'],
                // ['name' => 'Ajay Devgn'],
                // ['name' => 'Amala Paul'],
                // ['name' => 'Zoe Saldana'],
                // ['name' => 'Sam Worthington'],
                // ['name' => 'Kate Winslet'],
                // ['name' => 'Oona Chaplin'],
                // ['name' => 'Anupama Parmeswaran'],
                // ['name' => 'Ashish Reddy'],
                // ['name' => 'Karthik Rathnam'],

                ['name' => fake()->name()],
            ]
    
        ];
       
    }
}

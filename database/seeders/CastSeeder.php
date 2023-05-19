<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cast;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $casts = [
            ['name' => 'Yash'],
            ['name' => 'Srinidhi Shetty'],
            ['name' => 'Achyuth Kumar'],
            ['name' => 'Archana Jois'],
            ['name' => 'Sigourney Weaver'],
            ['name' => 'Stephen Lang'],
            ['name' => 'David Van Horn'],
            ['name' => 'Luke Hawker'],
            ['name' => 'Lucy Briant'],
            ['name' => 'Raveena Tandon'],
            ['name' => 'Sanjay Dutt'],
            ['name' => 'Prakash Raj'],
            ['name' => 'Ayyappa P. Sharma'],
            ['name' => 'N.T. Rama Rao'],
            ['name' => 'Ram Charan'],
            ['name' => 'Olivia Morris'],
            ['name' => 'Ray Stevenson'],
            ['name' => 'Alison Doody'],
            ['name' => 'Abhisek Bachchan'],
            ['name' => 'Ajay Devgn'],
            ['name' => 'Amala Paul'],
            ['name' => 'Zoe Saldana'],
            ['name' => 'Sam Worthington'],
            ['name' => 'Kate Winslet'],
            ['name' => 'Oona Chaplin'],
            ['name' => 'Anupama Parmeswaran'],
            ['name' => 'Ashish Reddy'],
            ['name' => 'Karthik Rathnam'],
        ];

        foreach ($casts as $cast) {
            Cast::create($cast);
        }
    }
}

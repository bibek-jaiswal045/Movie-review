<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['genre' => 'Action' ],
            ['genre' => 'Adventure' ],
            ['genre' => 'Drama' ],
            ['genre' => 'Fantasy' ],
            ['genre' => 'Science Fiction' ],
            ['genre' => 'Crime' ],
            ['genre' => 'Thriller' ],
            ['genre' => 'Romance' ],
        ];
        foreach ($genres as $genre) {
          Genre::create($genre);
      }
    }
}

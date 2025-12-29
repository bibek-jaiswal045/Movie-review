<?php

namespace Tests\Feature;

use App\Models\Movie;
use Database\Factories\MovieFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MoviePageTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_index_list_of_movies()
    {
        $this->withoutMiddleware();

        Movie::factory(1)->create();

        $response = $this->get(route('movie.index'));

        $response->assertStatus(200);

        $this->assertDatabaseCount('movies', Movie::count());
    }

    public function test_admin_can_see_a_single_movie()
    {
        $movie = Movie::first();

        $response = $this->get(route('showmovie', ['movie' => $movie->id]));

        $response->assertStatus(200);

        $this->assertDatabaseCount('movies', Movie::count());
    }

    public function test_admin_can_add_a_movie()
    {
        $this->withoutMiddleware();

        $response = $this->post(route('movie.store'), [
            'name' => fake()->name(),
            'isPublished' => '1',
            'image' => UploadedFile::fake()->image('cover.jpg'),
            'carousel_image' => UploadedFile::fake()->image('cover1.jpg'),
            'genre' => ['Action', 'Drama'],
            'status' => 'Upcoming',
            'released_date' => '2023-04-20',
            'director' => 'Prasanth Neel',
            'duration' => '02:36:30',
            'casts' => ['Yash', 'Srinidhi Shetty', 'Achyuth Kumar'],
            'details' => 'A period drama set in the 1970s, KGF follows the story of a fierce rebel who rises against the brutal oppression in Kolar Gold Fields and becomes the symbol of hope to legions of downtrodden people.',
        ]);

        $response->assertStatus(302);
    }

    public function test_admin_can_update_a_movie()
    {
        $this->withoutMiddleware();

        $movie = Movie::first();
        
        $movie_info =  [
            'name' => 'KGF Chapter 2',
            'isPublished' => '1',
            'image' => fake()->image('public/movieimages', 250 ,375, null, false),
            'carousel_image' => fake()->image('public/carouselimages', 1140 ,500, null, false),
            'genre' => "Action, Drama",
            'status' => 'Upcoming',
            'released_date' => '2023-04-20',
            'director' => 'Prasanth Neel',
            'duration' => '02:36:30',
            'casts' => "Yash, Srinidhi Shetty, Achyuth Kumar, Raveena Tandon, Sanjay Dutt",
            'details' => 'A period drama set in the 1970s, KGF follows the story of a fierce rebel who rises against the brutal oppression in Kolar Gold Fields and becomes the symbol of hope to legions of downtrodden people.',
        ];
        
       $this->put(route('movie.update', $movie->id), $movie_info);

        $movie->update($movie_info);

       $this->assertDatabaseHas('movies', [
            'id' => $movie->id, 
            'name' => 'KGF Chapter 2',

        ]);
    }

    public function test_admin_can_delete_a_movie()
    {
        $this->withoutMiddleware();

        $movie = Movie::first();
        
        $this->delete(route('movie.destroy',$movie->id));

        $movie->delete($movie);

        $this->assertDatabaseMissing('movies',['id' => $movie->id, 'name' => $movie->name]);

    }
}

<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientsideTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_see_all_movies()
    {
        $movies = Movie::latest()->where('isPublished', 1)->filter(request(['search']))->paginate(3)->withQueryString();

        $this->get(route('clientindex'))->assertStatus(200);
    }

    public function test_user_can_see_a_single_movie()
    {
        $movie = Movie::first();

        $this->get(route('showmovie', $movie->id))->assertStatus(200);

        $this->assertDatabaseCount('movies', Movie::count());
    }

    public function test_user_can_see_the_movie_calendar()
    {
        $this->get(route('calendar'))->assertStatus(200);
    }
}

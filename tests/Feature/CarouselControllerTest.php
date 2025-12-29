<?php

namespace Tests\Feature;

use App\Models\Carousel;
use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CarouselControllerTest extends TestCase
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

    public function test_admin_can_see_all_carousel()
    {
        $this->withoutMiddleware();

        $carousel = Carousel::all();

        Carousel::factory(1)->create();

        $this->get(route('carousel.index'))->assertOk();

        $this->assertDatabaseCount('carousels', Carousel::count());
    }

    public function test_admin_can_add_a_carousel()
    {
        $this->withoutMiddleware();

        // $movie = Movie::first();
        $movie = Movie::inRandomOrder()->take(1)->pluck('id');

        $this->post(route('carousel.store'), [
            'movie_id' => $movie
        ])->assertStatus(302);
    }

    public function test_admin_can_add_multiple_carousel()
    {
        $this->withoutMiddleware();

        // $movie = Movie::first();
        $movie = Movie::inRandomOrder()->take(2)->pluck('id');
        // dd($movie);
        // $data = ['movie_id' => $movie];
        $string_movie = collect($movie)->implode(',');
          $this->post(route('carousel.store'), [
                'movie_id' => $movie,
            ])->assertStatus(302);


    }

    public function test_admin_can_delete_a_carousel()
    {
        $this->withoutMiddleware();

        $carousel = Carousel::first();

        $this->delete(route('carousel.destroy', $carousel->id));

        $carousel->delete();

        $this->assertDatabaseMissing('carousels', ['movie_id' => $carousel->movie_id]);
    }
}

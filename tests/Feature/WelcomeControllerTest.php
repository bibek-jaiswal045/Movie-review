<?php

namespace Tests\Feature;

use App\Models\Carousel;
use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_can_see_the_homepage()
    {
        $carousel = Carousel::with('movie')->get();

        $movies = Movie::latest()->take(3)->get();

        $this->get(route('homepage'))->assertStatus(200);


    }
}

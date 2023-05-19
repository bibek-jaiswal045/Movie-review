<?php

namespace Tests\Feature;

use App\Models\Movie;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RatingControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_add_a_review()
    {
        $movie = Movie::where('id', '3')->get();
        $movie->id = 3;
        // dd($movie);
        $user = User::first();
        $data = [
            'user_id' =>    $user->id,
            'movie_id' => $movie->id,
            'ratings' => fake()->numberBetween(1,5),
        ];
        
        $rating = $this->post(route('addedstore',$movie->id),$data)->assertStatus(302);

        Rating::create($data);
    }

    public function test_user_can_delete_the_rating()
    {
        $rating = Rating::first();

        $this->delete(route('rating.destroy', $rating->id));

        $rating->delete();

        $this->assertDatabaseMissing('ratings', ['id' => $rating->id]);
        
    }
}

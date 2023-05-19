<?php

namespace Tests\Feature;

use App\Models\Genre;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class GenreControllerTest extends TestCase
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

    public function test_admin_can_see_all_genres()
    {
        $this->withoutMiddleware();

        $this->get(route('genre.index'))->assertStatus(200);

        $this->assertDatabaseCount('genres', Genre::count());
    }

    public function test_admin_can_add_a_genre()
    {
        $this->withoutMiddleware();

        $this->post(route('genre.store'), [
            'genre' => 'Action',
        ])->assertStatus(302);
    }

    public function test_admin_can_delete_a_genre()
    {
        $this->withoutMiddleware();

        $genre = Genre::first();

        $this->delete(route('genre.destroy', $genre->id));

        $genre->delete();

        $this->assertDatabaseMissing('genres', ['id' => $genre->id]);
    }

}

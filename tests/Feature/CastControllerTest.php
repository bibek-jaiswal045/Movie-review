<?php

namespace Tests\Feature;

use App\Models\Cast;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class CastControllerTest extends TestCase
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

    public function test_admin_can_see_all_casts()
    {
        $this->withoutMiddleware();
        
        $this->get(route('cast.index'))->assertStatus(200);

        $this->assertDatabaseCount('casts', Cast::count());
    }

    public function test_admin_can_add_a_cast()
    {
        $this->withoutMiddleware();

        $this->post(route('cast.store'),[
            'name' => 'Yash',
        ])->assertStatus(302);

    }

    public function test_admin_can_delete_a_cast()
    {
        $this->withoutMiddleware();

        $cast = Cast::first();

        $this->delete(route('cast.destroy', $cast->id));

        $cast->delete();

        $this->assertDatabaseMissing('casts', ['id' => $cast->id]);
    }
}

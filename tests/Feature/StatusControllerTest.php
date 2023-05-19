<?php

namespace Tests\Feature;

use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class StatusControllerTest extends TestCase
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

    public function test_admin_can_see_all_statuses()
    {
        $this->withoutMiddleware();

        Status::factory(1)->create();

        $this->get(route('status.index'))->assertStatus(200);

        $this->assertDatabaseCount('statuses', Status::count());

    }

    public function test_admin_can_add_a_status()
    {
        $this->withoutMiddleware();

        $this->post(route('status.store'),[
            'status' => 'Out of theatres',
        ])->assertStatus(302);

    }

    public function test_admin_can_delete_a_status()
    {
        $this->withoutMiddleware();
        
        $status = Status::first();

        $this->delete(route('status.destroy', $status->id));

        $status->delete();

        $this->assertDatabaseMissing('statuses', ['id' => $status->id, 'status' => $status->status]);
    }
    
}

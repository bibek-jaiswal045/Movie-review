<?php

namespace Tests\Feature;

use App\Models\Socialite as ModelsSocialite;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_redirect_handler()
    {
        $allDrivers = ['google', 'github', 'facebook'];

        $drivers = array_rand($allDrivers);

        $driver = $allDrivers[$drivers];

        $this->get(route('redirectuser', $driver))->assertStatus(302);
    }

    public function test_something_can_be_mocked()
    {
        $driver = "google";
    }

    public function test_callback_handler()
    {
        $driver = 'google';

        $name = fake()->name();

        $email = fake()->name() . '@gmail.com';

        $password = Hash::make(Str::random(10));

        $id = mt_rand(1400000000000000000, 1500000000000000000);

        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User')
                        ->shouldReceive('getId')
                        ->andReturn($id)
                        ->shouldReceive('getName')
                        ->andReturn($name)
                        ->shouldReceive('getEmail')
                        ->andReturn($email)
                        ->shouldReceive('password')
                        ->andReturn($password);

        User::create([
            'isAdmin' => 0,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'provider_id' => $id,
        ]);

        $this->get('/' . $driver . '/callback')->assertStatus(302);
    }
}

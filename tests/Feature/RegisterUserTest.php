<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase; // resets DB for each test

    /** @test */
    public function it_registers_a_user_successfully()
    {
        // Simulate POST request with valid user data
        $response = $this->postJson('/api/v1/registerUser2', [
            'name'                  => 'SunRaku',
            'email'                 => 'sunraku@gmail.com',
            'password'              => 'password123',
            'password_confirmation' => 'password123',
        ]);

        // 1. Assert the response
        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Registered and logged in successfully',
                 ]);

        // 2. Assert the user exists in DB
        $this->assertDatabaseHas('users', [
            'name'  => 'SunRaku',
            'email' => 'sunraku@gmail.com',
        ]);

        // 3. Assert password is hashed (not plain text)
        $user = User::where('email', 'sunraku@gmail.com')->first();
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /** @test */
    public function it_fails_if_email_is_not_unique()
    {
        // Create an existing user
        User::factory()->create([
            'email' => 'sunraku@gmail.com',
        ]);

        // Try registering with the same email
        $response = $this->postJson('/api/v1/registerUser2', [
            'name'                  => 'Duplicate',
            'email'                 => 'sunraku@gmail.com',
            'password'              => 'password123',
            'password_confirmation' => 'password123',
        ]);

        // Assert validation error
        
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }
}

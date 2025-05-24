<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user registration with valid data.
     *
     * @return void
     */
    public function test_user_can_register_with_valid_data()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
        ]);
    }

    /**
     * Test registration fails with duplicate email.
     *
     * @return void
     */
    public function test_registration_fails_with_duplicate_email()
    {
        User::factory()->create([
            'email' => 'duplicate@example.com',
        ]);

        $response = $this->post('/register', [
            'name' => 'Another User',
            'email' => 'duplicate@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test registration fails with invalid email.
     *
     * @return void
     */
    public function test_registration_fails_with_invalid_email()
    {
        $response = $this->post('/register', [
            'name' => 'Invalid Email User',
            'email' => 'invalid-email',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test registration fails with password confirmation mismatch.
     *
     * @return void
     */
    public function test_registration_fails_with_password_confirmation_mismatch()
    {
        $response = $this->post('/register', [
            'name' => 'Mismatch Password User',
            'email' => 'mismatch@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password1234!',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }
}

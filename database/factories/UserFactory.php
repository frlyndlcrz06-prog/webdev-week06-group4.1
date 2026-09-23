<?php

namespace Database\Factories;

use App\Models\User; // User model.
use Illuminate\Database\Eloquent\Factories\Factory; // Factory base.
use Illuminate\Support\Facades\Hash; // Hash helper.
use Illuminate\Support\Str; // String helper.

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory // User factory.
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password; // Shared password.

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array // Default state.
    {
        return [
            'name' => fake()->name(), // User name.
            'email' => fake()->unique()->safeEmail(), // Unique email.
            'email_verified_at' => now(), // Verification time.
            'password' => static::$password ??= Hash::make('password'), // Hashed password.
            'remember_token' => Str::random(10), // Remember token.
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static // Unverified state.
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null, // Clear verification.
        ]);
    }
}

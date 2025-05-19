<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subscription_id' => 'SUB-'.Str::random(6),
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'registration_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'termination_date' => $this->faker->optional(0.1)->dateTimeBetween('-1 year', 'now'), // 10% chance of being terminated
            'role' => $this->faker->randomElement(['admin', 'user', 'manager', 'technician']),
            'apple_id' => $this->faker->optional(0.3)->uuid(), // 30% chance of having apple id
            'last_login' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['active', 'inactive', 'suspended']),
            'profile_image' => null,
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Generate a profile image path or null.
     */
    protected function getProfileImage(): ?string
    {
        // 70% chance to have a profile image
        if ($this->faker->boolean(70)) {
            $image = $this->faker->image(
                public_path('storage/profile-images'), 
                200, 
                200, 
                'people',
                false
            );
            return 'profile-images/'.$image;
        }

        return null;
    }

    /**
     * State for admin users.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'profile_id' => 'ADM-'.Str::random(6),
        ]);
    }

    /**
     * State for technician users.
     */
    public function technician(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'technician',
            'profile_id' => 'TEC-'.Str::random(6),
        ]);
    }

    /**
     * State for active users.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
            'termination_date' => null,
        ]);
    }

    /**
     * State for inactive users.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }
}
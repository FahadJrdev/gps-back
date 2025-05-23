<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Vehicle;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'alias' => fake()->word(),
            'type' => fake()->word(),
            'license_plate' => fake()->unique()->regexify('[A-Z]{2,3}-[0-9]{3,4}'),
            'make' => fake()->word(),
            'model' => fake()->word(),
            'year' => fake()->numberBetween(-10000, 10000),
            'color' => fake()->word(),
            'registration_date' => fake()->date(),
            'system_type' => fake()->word(),
            'status' => fake()->randomElement(["active","inactive"]),
        ];
    }
}

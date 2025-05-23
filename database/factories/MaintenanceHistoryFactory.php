<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MaintenanceHistory;
use App\Models\Vehicle;

class MaintenanceHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaintenanceHistory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'maintenance_type' => fake()->word(),
            'kilometers' => fake()->numberBetween(-10000, 10000),
            'completion_date' => fake()->date(),
            'observations' => fake()->text(),
        ];
    }
}

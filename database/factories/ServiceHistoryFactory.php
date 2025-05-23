<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ServiceHistory;
use App\Models\Technician;
use App\Models\Vehicle;

class ServiceHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceHistory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'technician_id' => Technician::factory(),
            'service_type' => fake()->randomElement(["installation","uninstallation","maintenance","inspection"]),
            'scheduled_date' => fake()->date(),
            'completion_date' => fake()->date(),
            'observations' => fake()->text(),
            'status' => fake()->randomElement(["scheduled","in_progress","completed"]),
            'kilometers' => fake()->numberBetween(-10000, 10000),
        ];
    }
}

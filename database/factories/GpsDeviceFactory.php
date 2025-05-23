<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\GpsDevice;
use App\Models\Vehicle;

class GpsDeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GpsDevice::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'imei' => fake()->word(),
            'device_type' => fake()->word(),
            'manufacturer' => fake()->word(),
            'model' => fake()->word(),
            'firmware_version' => fake()->word(),
            'installation_date' => fake()->date(),
            'status' => fake()->randomElement(["active","inactive","maintenance"]),
        ];
    }
}

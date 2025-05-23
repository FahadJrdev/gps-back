<?php

namespace Database\Seeders;

use App\Models\GpsDevice;
use Illuminate\Database\Seeder;

class GpsDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GpsDevice::factory()->count(5)->create();
    }
}

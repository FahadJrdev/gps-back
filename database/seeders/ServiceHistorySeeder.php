<?php

namespace Database\Seeders;

use App\Models\ServiceHistory;
use Illuminate\Database\Seeder;

class ServiceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceHistory::factory()->count(5)->create();
    }
}

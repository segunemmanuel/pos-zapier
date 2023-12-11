<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SafetyIncident;

class SafetyIncidentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SafetyIncident::factory()->count(50)->create();
    }
}

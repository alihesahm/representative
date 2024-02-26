<?php

namespace Database\Seeders;

use App\Models\Broker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Broker::factory()->create([
            'name' => 'Test Broker',
            'residency_number' => '0000',
            'job_number' => '0000',
            'phone' => '1234567890',
            'email' => 'admin@admin.com',
            'status' => 'active',
        ]);
        Broker::factory()->count(5)->create();
    }
}

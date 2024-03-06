<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'admin@admin.com',
             'password' => 'password'
         ]);
         $this->call([
             BrokerSeeder::class,
             ClientSeeder::class,
             LocationSeeder::class
         ]);

        Artisan::call('ide-helper:generate');
        Artisan::call('ide-helper:models -n');
        Artisan::call('ide-helper:meta');
    }
}

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
        $file_path = storage_path('app/clientname.csv');

        $open = fopen($file_path, "r");
        $is_first = true;
        $brokers = [];
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
        {
            if(!$is_first){
                $brokers[] = [
                    'name' => $data[1],
                    'job_number' => $data[2],
                    'job_title' => $data[3],
                    'phone' => $data[4],
                    'manager_name' => $data[5],
                    'nationality' => $data[6],
                    'branch' => $data[7],
                    'department' => $data[8],
                    'residency_number' => $data[9],
                ];
            }else{
                $is_first = false;
            }
        }
        fclose($open);
        Broker::insert($brokers);
        Broker::factory()->create([
            'name' => 'Test Broker',
            'residency_number' => '0000',
            'job_number' => '0000',
            'phone' => '1234567890',
            'email' => 'admin@admin.com',
            'status' => 'active',
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file_path = storage_path('app/location.csv');

        $open = fopen($file_path, "r");
        $is_first = true;
        $locations = [];
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
        {
            if(!$is_first){

                $locations[] = [
                    'client_id' => $data[0],
                    'city' => $data[2],
                    'address' => $data[3],
                    'link' => $data[4]
                ];
            }else{
                $is_first = false;
            }
        }
        fclose($open);

        \App\Models\Location::insert($locations);

    }
}

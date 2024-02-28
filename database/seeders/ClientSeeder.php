<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file_path = storage_path('app/newfile.csv');

        $open = fopen($file_path, "r");
        $is_first = true;
        $clients = [];
        while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
        {
            if(!$is_first){
                $clients[] = [
                    'id' => $data[0],
                    'name' => $data[1],
                    'is_new' => true,
                ];
            }else{
                $is_first = false;
            }
        }
        fclose($open);
        Client::insert($clients);
    }
}

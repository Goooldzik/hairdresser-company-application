<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'hairdresser_id' => 1,
                'name' => 'Adam',
                'surname' => 'Nowacki',
                'client_library_number' => 1524,
                'phone_number' => Str::random(12),
                'email' => Str::random(12)
            ],
            [
                'hairdresser_id' => 1,
                'name' => 'Paweł',
                'surname' => 'Historyk',
                'client_library_number' => 1224,
                'phone_number' => Str::random(12),
                'email' => Str::random(12)
            ],
            [
                'hairdresser_id' => 1,
                'name' => 'Michał',
                'surname' => 'Kowalski',
                'client_library_number' => 1556,
                'phone_number' => Str::random(12),
                'email' => Str::random(12)
            ],
        ];

        Client::insert($data);
    }
}

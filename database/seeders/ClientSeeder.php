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
                'name' => 'Patryk',
                'surname' => 'Kacprowicz',
                'client_library_id' => 1234567890,
                'phone_number' => Str::random(12),
                'email' => Str::random(12)
            ]
        ];

        Client::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\ClientLibrary;
use Illuminate\Database\Seeder;

class ClientLibrarySeeder extends Seeder
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
                'client_id' => 1,
                'hairdresser_id' => 1,
                'client_library_number' => 1524,
                'content' => 'Zejście z koloru rudego 2 tony niżej farbą Matrix'
            ],
            [
                'client_id' => 1,
                'hairdresser_id' => 1,
                'client_library_number' => 1524,
                'content' => 'Druga wizyta'
            ],
            [
                'client_id' => 1,
                'hairdresser_id' => 1,
                'client_library_number' => 1524,
                'content' => 'Trzecia wizyta'
            ],
            [
                'client_id' => 2,
                'hairdresser_id' => 1,
                'client_library_number' => 1224,
                'content' => 'Pierwsze spotkanie konsultacyjne'
            ],
        ];

        ClientLibrary::insert($data);
    }
}

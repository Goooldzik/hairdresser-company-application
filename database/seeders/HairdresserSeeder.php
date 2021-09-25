<?php

namespace Database\Seeders;

use App\Models\Hairdresser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HairdresserSeeder extends Seeder
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
                'user_id' => 1,
                'name' => 'Kamil',
                'surname' => 'Michacki',
                'hairdresser_number' => 1637,
                'phone_number' => 'sdhjkasuhkgujaf'
            ]
        ];

        Hairdresser::insert($data);
    }
}

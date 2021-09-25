<?php

namespace Database\Seeders;

use App\Models\HairdresserProfile;
use Illuminate\Database\Seeder;

class HairdresserProfileSeeder extends Seeder
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
                'description' => 'My description'
            ]
        ];

        HairdresserProfile::insert($data);
    }
}

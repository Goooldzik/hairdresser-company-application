<?php

namespace Database\Seeders;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
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
                'visit_at' => Carbon::tomorrow()
            ],
            [
                'client_id' => 3,
                'hairdresser_id' => 1,
                'visit_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'client_id' => 2,
                'hairdresser_id' => 1,
                'visit_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        Booking::insert($data);
    }
}

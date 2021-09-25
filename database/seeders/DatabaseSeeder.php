<?php

namespace Database\Seeders;

use App\Models\HairdresserProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            HairdresserSeeder::class,
            ClientSeeder::class,
            ClientLibrarySeeder::class,
            HairdresserProfileSeeder::class,
            BookingSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Kamil', 'surname' => 'Michacki', 'email' => 'admin@admin.pl', 'password' => Hash::make('admin123')]
        ];

        User::insert($data);
    }
}

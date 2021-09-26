<?php

namespace Database\Factories;

use App\Models\Client;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'hairdresser_id' => 1,
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'client_library_number' => random_int(1000, 9999),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'created_at' => now()
        ];
    }
}

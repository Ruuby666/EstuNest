<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $landlord = User::where('type', 'landlord')->inRandomOrder()->first();

        return [
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(10000, 1000000),
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'images' => $this->faker->imageUrl(),
            'dni_landlord' => $landlord->dni,
        ];
    }
}

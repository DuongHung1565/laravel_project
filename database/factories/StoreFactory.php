<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Store;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}

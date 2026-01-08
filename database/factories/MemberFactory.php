<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Member;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'member_code' => $this->faker->unique()->numberBetween(),
            'fullname' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'membership_type' => $this->faker->randomElement(['Basic', 'Premium', 'VIP']),
            

        ];
    }
}

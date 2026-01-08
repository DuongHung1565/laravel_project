<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Book;
use App\Models\Member;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'members_id' => Member::factory(),
            'title' => $this->faker->sentence(),
            'author' => $this->faker->sentence(),
            'isbn' => $this->faker->words(3,true), 
            'publication_year' => $this->faker->year(),  
            'copies_available' => $this->faker->numberBetween(0,100),
        ];
    }
}

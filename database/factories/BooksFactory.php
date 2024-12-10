<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    protected $model = Books::class;

    public function definition(): array
    {
        return [
            'название' => $this->faker->sentence(3),
            'автор' => $this->faker->name(),
            'дата_публикации' => $this->faker->date(),
            'цена' => $this->faker->randomFloat(2, 100, 5000),
            'страницы' => $this->faker->numberBetween(50, 1000),
            'доступность' => $this->faker->boolean(),
            'рейтинг' => $this->faker->randomFloat(2, 0, 5),
            'добавлено' => $this->faker->dateTimeThisYear(),
        ];
    }
}

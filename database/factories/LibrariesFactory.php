<?php

namespace Database\Factories;

use App\Models\Libraries;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibrariesFactory extends Factory
{
    protected $model = Libraries::class;

    public function definition(): array
    {
        return [
            'название' => $this->faker->company(),
            'адрес' => $this->faker->address(),
            'часы_работы' => $this->faker->word(),
            'открыта' => $this->faker->boolean(),
            'вместимость_книг' => $this->faker->numberBetween(1000, 10000),
            'дата_основания' => $this->faker->date(),
            'рейтинг' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}

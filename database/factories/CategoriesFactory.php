<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Categories::class;

    public function definition(): array
    {
        return [
            'название' => $this->faker->word(),
            'описание' => $this->faker->sentence(),
            'приоритет' => $this->faker->numberBetween(1, 10),
            'дата_создания' => $this->faker->date(),
            'возрастное_ограничение' => $this->faker->boolean(50),
            'пупулярность' => $this->faker->numberBetween(100, 10000),
            'количество_книг' => $this->faker->numberBetween(0, 100),
        ];
    }
}

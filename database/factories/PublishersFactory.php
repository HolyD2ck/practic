<?php

namespace Database\Factories;

use App\Models\Publishers;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublishersFactory extends Factory
{
    protected $model = Publishers::class;

    public function definition(): array
    {
        return [
            'название' => $this->faker->company(),
            'адрес' => $this->faker->address(),
            'телефон' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'год_основания' => $this->faker->year(),
            'активность' => $this->faker->boolean(),
            'сайт' => $this->faker->url(),
        ];
    }
}

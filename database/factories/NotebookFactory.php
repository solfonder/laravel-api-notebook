<?php

namespace Database\Factories;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotebookFactory extends Factory
{
    protected string $model = Notebook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'birth' => $this->faker->dateTime,
        ];
    }
}

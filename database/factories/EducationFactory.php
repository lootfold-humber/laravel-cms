<?php

namespace Database\Factories;

use App\Models\EducationLevel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'institution' => $this->faker->company(),
            'field' => $this->faker->word,
            'start' => $this->faker->year,
            'completion' => $this->faker->year,
            'education_level_id' => EducationLevel::all()->random(),
            'user_id' => User::all()->random(),
        ];
    }
}

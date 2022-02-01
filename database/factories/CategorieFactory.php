<?php

namespace Database\Factories;

use App\Enums\RessourceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                RessourceCategory::Communication->value,
                RessourceCategory::Culture->value,
                RessourceCategory::Development->value,
                RessourceCategory::Emotion->value,
                RessourceCategory::Hobby->value,
                RessourceCategory::Pro->value,
                RessourceCategory::Parent->value,
                RessourceCategory::Quality->value,
                RessourceCategory::Sense->value,
                RessourceCategory::Physical->value,
                RessourceCategory::Psychological->value,
                RessourceCategory::Spirit->value,
                RessourceCategory::Love->value,
            ]),
        ];
    }
}

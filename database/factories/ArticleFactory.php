<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'source_url' => 'https://www.cairn.info/revue-sciences-du-design-2021-2-page-55.htm',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_uri'      => Storage::url('photos/Depositphotos_320343344_XL.jpg'),
            'photo_author'  => 'https://fr.depositphotos.com/stock-photos/business-finance.html',
            'legend'        => $this->faker->sentence(),
        ];
    }
}

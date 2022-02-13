<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_uri'  => Storage::url('videos/c2O1WV6hVHa2AjPF1ly04HBy0f0RA1mv9nfbzhbz.mp4'),
            'link'      => '',
            'legend'    => $this->faker->sentence(),
        ];
    }
}

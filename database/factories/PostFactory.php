<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'main_image' => 'images/3x8zUdN95TZyk7qRS4dtuecQ52ebjEOLy2OsBbqt.jpg',
            'secondary_image' => 'images/YuBXe1ENbD8VHbtg78bKK8EHZr178gOokmkKPrfr.jpg'
        ];
    }
}

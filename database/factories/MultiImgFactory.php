<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Jetstream\Features;

class MultiImgFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $var1 = 'upload/default/p';
        $var2 = '.jpg';
        $num = $this->faker->numberBetween($min = 1, $max = 8);
        return [
            'product_id' => $this->faker->numberBetween($min = 1, $max = 40),
            'photo_name' => $var1.$num.$var2,
            'image_order' => 1
        ];
    }
}

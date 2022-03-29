<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Jetstream\Features;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word();
        $text = $this->faker->text();
        $var1 = 'upload/default/p';
        $var2 = '.jpg';
        $num = $this->faker->numberBetween($min = 1, $max = 8);
        return [
            'brand_id' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'subsubcategory_id' => 1,
            'product_name_en' => $title,
            'product_name_esp' => $title,
            'product_slug_en' => strtolower(str_replace(' ','-',$title)),
            'product_slug_esp' => strtolower(str_replace(' ','-',$title)),
            'product_code' => $this->faker->ean8(),
            'product_qty' => '100',
            'product_qty_start' => '100',
            'product_weight' => 2,
            'product_tags_en' => 'pro',
            'product_tags_esp' => 'pro',
            'product_size_en' => NULL,
            'product_size_esp' => NULL,
            'product_color_en' => NULL,
            'product_color_esp' => NULL,
            'selling_price' => $this->faker->numberBetween($min = 50000, $max = 200000),
            'supplier_price' => $this->faker->numberBetween($min = 50000, $max = 200000),
            'discount_price' => NULL,
            'short_descp_en' => 'Producto',
            'short_descp_esp' => 'Producto',
            'long_descp_en' => $text,
            'long_descp_esp' => $text,
            'product_thambnail' => $var1.$num.$var2,
            'hot_deals' => NULL,
            'featured' => NULL,
            'special_offer' => NULL,
            'special_deals' => NULL,
            'status' => 1,
            'puntos' => $this->faker->numberBetween($min = 1, $max = 100)
        ];
    }
}

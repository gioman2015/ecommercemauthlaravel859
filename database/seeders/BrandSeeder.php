<?php

namespace Database\Seeders;
use App\Models\Brand;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand1 = Brand::create([
            'brand_name_en' => 'Marca1',
            'brand_name_esp' => 'Marca1',
            'brand_slug_en' => 'marca1',
            'brand_slug_esp' => 'marca1',
            'brand_image' => '',
        ]);

        $brand2 = Brand::create([
            'brand_name_en' => 'Marca2',
            'brand_name_esp' => 'Marca2',
            'brand_slug_en' => 'marca2',
            'brand_slug_esp' => 'marca2',
            'brand_image' => '',
        ]);

        $brand3 = Brand::create([
            'brand_name_en' => 'Marca3',
            'brand_name_esp' => 'Marca3',
            'brand_slug_en' => 'marca3',
            'brand_slug_esp' => 'marca3',
            'brand_image' => '',
        ]);
    }
}

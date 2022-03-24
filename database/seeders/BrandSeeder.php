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
            'brand_image' => 'upload/default/logo-1.png',
        ]);

        $brand2 = Brand::create([
            'brand_name_en' => 'Marca2',
            'brand_name_esp' => 'Marca2',
            'brand_slug_en' => 'marca2',
            'brand_slug_esp' => 'marca2',
            'brand_image' => 'upload/default/logo-2.png',
        ]);

        $brand3 = Brand::create([
            'brand_name_en' => 'Marca3',
            'brand_name_esp' => 'Marca3',
            'brand_slug_en' => 'marca3',
            'brand_slug_esp' => 'marca3',
            'brand_image' => 'upload/default/logo-3.png',
        ]);

        $brand4 = Brand::create([
            'brand_name_en' => 'Marca4',
            'brand_name_esp' => 'Marca4',
            'brand_slug_en' => 'marca4',
            'brand_slug_esp' => 'marca4',
            'brand_image' => 'upload/default/logo-4.png',
        ]);

        $brand5 = Brand::create([
            'brand_name_en' => 'Marca5',
            'brand_name_esp' => 'Marca5',
            'brand_slug_en' => 'marca5',
            'brand_slug_esp' => 'marca5',
            'brand_image' => 'upload/default/logo-5.png',
        ]);
    }
}

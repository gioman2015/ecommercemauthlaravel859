<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\MultiImg;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = Product::create([
            'id' => 1,
            'brand_id' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'subsubcategory_id' => 1,
            'product_name_en' => 'Producto1',
            'product_name_esp' => 'Producto1',
            'product_slug_en' => 'producto1',
            'product_slug_esp' => 'producto1',
            'product_code' => '0000001',
            'product_qty' => '100',
            'product_weight' => 2,
            'product_tags_en' => 'pro',
            'product_tags_esp' => 'pro',
            'product_size_en' => NULL,
            'product_size_esp' => NULL,
            'product_color_en' => NULL,
            'product_color_esp' => NULL,
            'selling_price' => '100000',
            'supplier_price' => '50000',
            'discount_price' => NULL,
            'short_descp_en' => 'Producto',
            'short_descp_esp' => 'Producto',
            'long_descp_en' => '<p>Producto<p>',
            'long_descp_esp' => '<p>Producto<p>',
            'product_thambnail' => 'upload/default/pt1.jpg',
            'hot_deals' => NULL,
            'featured' => NULL,
            'special_offer' => NULL,
            'special_deals' => NULL,
            'status' => 1,
        ]);

        $product2 = Product::create([
            'id' => 2,
            'brand_id' => 2,
            'category_id' => 2,
            'subcategory_id' => 2,
            'subsubcategory_id' => 2,
            'product_name_en' => 'Producto2',
            'product_name_esp' => 'Producto2',
            'product_slug_en' => 'producto2',
            'product_slug_esp' => 'producto2',
            'product_code' => '0000002',
            'product_qty' => '50',
            'product_weight' => 5,
            'product_tags_en' => 'pro',
            'product_tags_esp' => 'pro',
            'product_size_en' => NULL,
            'product_size_esp' => NULL,
            'product_color_en' => NULL,
            'product_color_esp' => NULL,
            'selling_price' => '50000',
            'supplier_price' => '25000',
            'discount_price' => NULL,
            'short_descp_en' => 'Producto',
            'short_descp_esp' => 'Producto',
            'long_descp_en' => '<p>Producto<p>',
            'long_descp_esp' => '<p>Producto<p>',
            'product_thambnail' => 'upload/default/pt2.jpg',
            'hot_deals' => NULL,
            'featured' => NULL,
            'special_offer' => NULL,
            'special_deals' => NULL,
            'status' => 1,
        ]);

        $multiImg1 = MultiImg::create([
            'id' => 1,
            'product_id' => 1,
            'photo_name' => 'upload/default/p1.jpg',
            'image_order' => 1
        ]);
        $multiImg2 = MultiImg::create([
            'id' => 2,
            'product_id' => 1,
            'photo_name' => 'upload/default/p2.jpg',
            'image_order' => 1
        ]);
        $multiImg3 = MultiImg::create([
            'id' => 3,
            'product_id' => 1,
            'photo_name' => 'upload/default/p3.jpg',
            'image_order' => 1
        ]);
        $multiImg4 = MultiImg::create([
            'id' => 4,
            'product_id' => 1,
            'photo_name' => 'upload/default/p4.jpg',
            'image_order' => 1
        ]);

        $multiImg5 = MultiImg::create([
            'id' => 5,
            'product_id' => 2,
            'photo_name' => 'upload/default/p5.jpg',
            'image_order' => 1
        ]);
        $multiImg6 = MultiImg::create([
            'id' => 6,
            'product_id' => 2,
            'photo_name' => 'upload/default/p6.jpg',
            'image_order' => 1
        ]);
        $multiImg7 = MultiImg::create([
            'id' => 7,
            'product_id' => 2,
            'photo_name' => 'upload/default/p7.jpg',
            'image_order' => 1
        ]);
        $multiImg8 = MultiImg::create([
            'id' => 8,
            'product_id' => 2,
            'photo_name' => 'upload/default/p8.jpg',
            'image_order' => 1
        ]);
    }
}

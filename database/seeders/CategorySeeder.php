<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $category1 = Category::create([
            'id' => 1,
            'category_name_en' => 'Categoria1',
            'category_name_esp' => 'Categoria1',
            'category_slug_en' => 'categoria1',
            'category_slug_esp' => 'categoria1',
            'category_icon' => 'fa fa-circle',
            'category_order'  => 1
        ]);

        $category2 = Category::create([
            'id' => 2,
            'category_name_en' => 'Categoria2',
            'category_name_esp' => 'Categoria2',
            'category_slug_en' => 'categoria2',
            'category_slug_esp' => 'categoria2',
            'category_icon' => 'fa fa-circle',
            'category_order' => 2
        ]);

        $subCategory1 = SubCategory::create([
            'id' => 1,
            'subcategory_name_en' => 'SubCategoria1',
            'subcategory_name_esp' => 'SubCategoria1',
            'subcategory_slug_en' => 'subcategoria1',
            'subcategory_slug_esp' => 'subcategoria1',
            'category_id' => $category1->id
        ]);

        $subCategory2 = SubCategory::create([
            'id' => 2,
            'subcategory_name_en' => 'SubCategoria2',
            'subcategory_name_esp' => 'SubCategoria2',
            'subcategory_slug_en' => 'subcategoria2',
            'subcategory_slug_esp' => 'subcategoria2',
            'category_id' => $category2->id
        ]);

        $subSubCategory1 = SubSubCategory::create([
            'subsubcategory_name_en' => 'SubSubCategoria1',
            'subsubcategory_name_esp' => 'SubSubCategoria1',
            'subsubcategory_slug_en' => 'subsubcategoria1',
            'subsubcategory_slug_esp' => 'subsubcategoria1',
            'category_id' => $category1->id,
            'subcategory_id' => $subCategory1->id
        ]);

        $subSubCategory2 = SubSubCategory::create([
            'subsubcategory_name_en' => 'SubSubCategoria2',
            'subsubcategory_name_esp' => 'SubSubCategoria2',
            'subsubcategory_slug_en' => 'subsubcategoria2',
            'subsubcategory_slug_esp' => 'subsubcategoria2',
            'category_id' => $category2->id,
            'subcategory_id' => $subCategory2->id
        ]);
    }
}

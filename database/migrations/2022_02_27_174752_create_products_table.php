<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_esp');
            $table->string('product_slug_en');
            $table->string('product_slug_esp');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_qty_start');
            $table->string('product_weight')->default(1);
            $table->string('product_tags_en');
            $table->string('product_tags_esp');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_esp')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_esp')->nullable();
            $table->string('selling_price');
            $table->string('supplier_price');
            $table->string('discount_price')->nullable();
            $table->string('short_descp_en');
            $table->string('short_descp_esp');
            $table->mediumText('long_descp_en');
            $table->mediumText('long_descp_esp');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->integer('puntos')->default(0);
            $table->integer('order')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

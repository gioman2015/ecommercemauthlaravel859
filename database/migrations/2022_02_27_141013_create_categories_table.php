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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name_en');
            $table->string('category_name_esp');
            $table->string('category_slug_en');
            $table->string('category_slug_esp');
            $table->string('category_icon')->nullable();
            $table->integer('category_order')->default(1)->nullable();
            $table->string('slider_categoria_1')->nullable();
            $table->string('slider_categoria_2')->nullable();
            $table->string('slider_categoria_3')->nullable();
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
        Schema::dropIfExists('categories');
    }
};

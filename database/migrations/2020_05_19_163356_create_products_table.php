<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('section_id');
            $table->integer('category_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->text('product_description');
            $table->float('product_price');
            $table->string('product_image');
            $table->string('product_discount')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('product_video')->nullable();
            $table->string('product_washcare')->nullable();
            $table->string('product_fabric')->nullable();
            $table->string('product_pattern')->nullable();
            $table->string('product_sleeve')->nullable();
            $table->string('product_fit')->nullable();
            $table->string('product_occassion')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->enum('is_featured', ['No', 'Yes'])->nullable();
            $table->tinyInteger('status');
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
}

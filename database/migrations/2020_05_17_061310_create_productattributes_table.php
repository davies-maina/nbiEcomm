<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductattributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productattributes', function (Blueprint $table) {
            $table->id();
            /* $table->integer('product_id'); */
            $table->foreignId('product_id')->constrained();
            $table->string('sku'); //stock keeping unit
            $table->string('size');
            $table->float('price');
            $table->integer('stock');
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
        Schema::dropIfExists('productattributes');
    }
}

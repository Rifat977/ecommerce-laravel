<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcomProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecom_products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->integer('categoryId');
            $table->string('sku');
            $table->string('image');
            $table->float('regularPrice');
            $table->float('price');
            $table->integer('stock');
            $table->string('description');
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
        Schema::dropIfExists('ecom_products');
    }
}

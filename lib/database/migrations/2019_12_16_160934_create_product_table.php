<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('join_products_stores');
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_sku');
            $table->string('product_detail')->nullable();
            $table->double('product_price');
            $table->string('product_image')->nullable();

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('join_products_stores', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('product_id');
            // RELATIONSHIP
            $table->foreign('store_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('join_products_stores');
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}

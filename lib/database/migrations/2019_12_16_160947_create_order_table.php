<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('join_orders_products');
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('order_total')->default(0);
            $table->double('order_tax')->default(0);
            $table->string('order_address')->nullable();
            $table->string('hash')->nullable();
            $table->string('status')->nullable();

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('join_orders_products', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->double('quantity')->default(0);
            $table->double('price')->default(0);
            // RELATIONSHIP
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('join_orders_products');
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
}

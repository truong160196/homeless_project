<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('join_auctions_locations');
        Schema::dropIfExists('join_auctions_activities');
        Schema::dropIfExists('auction_histories');
        Schema::dropIfExists('auctions');

        Schema::create('auctions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('auction_title')->nullable();
            $table->longText('auction_detail')->nullable();
            $table->timestamp('auction_start_time')->nullable();
            $table->timestamp('auction_end_time')->nullable();
            $table->double('auction_raised')->nullable();
            $table->string('product_title')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_detail')->nullable();
            $table->string('production_author')->nullable();
            $table->string('auction_address')->nullable();
            $table->string('auction_private_key')->nullable();
            $table->string('auction_public_key')->nullable();
            $table->string('donate_status')->default('new');
            $table->tinyInteger('is_delete')->default(0);

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('join_auctions_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('auction_id');
            $table->unsignedBigInteger('activity_id');

            // RELATIONSHIP
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('donate_activities')->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('join_auctions_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('auction_id');
            $table->unsignedBigInteger('location_id');

            // RELATIONSHIP
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('auction_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('value')->nullable();
            $table->string('hash')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('is_delete')->default(0);

            // RELATIONSHIP
            $table->unsignedBigInteger('auction_id');
            $table->foreign('auction_id')
                ->references('id')
                ->on('auctions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('join_auctions_locations');
        Schema::dropIfExists('join_auctions_activities');
        Schema::dropIfExists('auction_histories');
        Schema::dropIfExists('auctions');
    }
}

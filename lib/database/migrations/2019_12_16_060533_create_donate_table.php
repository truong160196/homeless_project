<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('join_donates_activities');
        Schema::dropIfExists('donate_activities');
        Schema::dropIfExists('join_donates_locations');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('donate_histories');
        Schema::dropIfExists('donates');
        Schema::dropIfExists('donate_categories');

        Schema::create('donate_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name')->nullable();
            $table->longText('category_detail')->nullable();
            $table->tinyInteger('is_delete')->default(0);

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('donates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('donate_title')->nullable();
            $table->longText('donate_detail')->nullable();
            $table->timestamp('donate_start_time')->nullable();
            $table->timestamp('donate_end_time')->nullable();
            $table->double('donate_goal')->nullable();
            $table->double('donate_raised')->nullable();
            $table->string('donate_address')->nullable();
            $table->string('donate_private_key')->nullable();
            $table->string('donate_public_key')->nullable();
            $table->string('donate_status')->default('new');
            $table->tinyInteger('is_delete')->default(0);

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('donate_categories')
                ->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('donate_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('activity_name')->nullable();
            $table->longText('activity_detail')->nullable();
            $table->tinyInteger('is_delete')->default(0);

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('join_donates_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('donate_id');
            $table->unsignedBigInteger('activity_id');

            // RELATIONSHIP
            $table->foreign('donate_id')->references('id')->on('donates')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('donate_activities')->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location_name')->nullable();

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('join_donates_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('donate_id');
            $table->unsignedBigInteger('location_id');

            // RELATIONSHIP
            $table->foreign('donate_id')->references('id')->on('donates')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('donate_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('value')->nullable();
            $table->string('hash')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('is_delete')->default(0);

            // RELATIONSHIP
            $table->unsignedBigInteger('donate_id');
            $table->foreign('donate_id')
                ->references('id')
                ->on('donates')
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
        Schema::dropIfExists('join_donates_activities');
        Schema::dropIfExists('donate_activities');
        Schema::dropIfExists('join_donates_locations');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('donate_histories');
        Schema::dropIfExists('donates');
        Schema::dropIfExists('donate_categories');
    }
}

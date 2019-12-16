<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('wallets');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('join_users_transactions');
        Schema::enableForeignKeyConstraints();

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('access_key')->nullable();
            $table->string('username')->unique();
            // password
            $table->string('password');
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->integer('score')->nullable();
            $table->unsignedTinyInteger('email_verify')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('code')->nullable();
            $table->string('otp')->nullable();
            $table->timestamp('otp_expired')->nullable();
            $table->unsignedTinyInteger('otp_verify')->default(0);
            $table->unsignedTinyInteger('google_auth_verify')->default(0);
            $table->timestamp('last_update_password')->nullable();
            $table->timestamp('last_local_login')->nullable();
            $table->tinyInteger('is_delete')->default(0);
            $table->unsignedTinyInteger('status')->default(1);
            // RELATIONSHIP
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->string('type')->nullable();
            $table->string('token')->nullable();
            $table->string('chain_code')->nullable();
            $table->string('contract_address')->nullable();
            // private key
            $table->string('pk')->nullable();
            $table->string('public_key')->nullable();
            // RELATIONSHIP
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hash')->nullable();
            $table->string('block')->nullable();
            $table->string('type')->nullable();
            $table->string('amount')->nullable();
            $table->string('price')->nullable();
            $table->string('fee')->nullable();
            $table->string('tax')->nullable();
            $table->string('detail')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('join_users_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_id');
            // RELATIONSHIP
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
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
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('wallets');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('join_users_transactions');
        Schema::enableForeignKeyConstraints();
    }
}

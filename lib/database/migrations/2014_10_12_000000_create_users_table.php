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
        Schema::dropIfExists('join_users_transactions');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('wallets');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::enableForeignKeyConstraints();

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            // password
            $table->string('password');
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('user_type')->nullable();
            $table->integer('score')->nullable();
            $table->string('access_key')->nullable();
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
            $table->string('status')->nullable();
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
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hash')->nullable();
            $table->string('block')->nullable();
            $table->string('type')->nullable();
            $table->string('amount')->nullable();
            $table->string('token')->nullable();
            $table->string('price')->nullable();
            $table->string('fee')->nullable();
            $table->string('tax')->nullable();
            $table->string('detail')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('time_transaction')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('join_users_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_id');
            // RELATIONSHIP
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('join_users_transactions');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('wallets');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::enableForeignKeyConstraints();
    }
}

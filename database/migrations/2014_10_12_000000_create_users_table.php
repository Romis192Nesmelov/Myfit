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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->boolean('active')->nullable();
            $table->boolean('admin')->nullable();
            $table->string('password');
            $table->string('auth_token')->nullable();
            $table->string('access_token')->nullable();
            $table->integer('access_token_expired')->nullable();
            $table->string('confirm_email_token')->nullable();
            $table->string('restore_password_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

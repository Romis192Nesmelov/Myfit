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
//        Schema::create('users', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->string('name',191);
//            $table->string('location',191)->nullable();
//
//            $table->string('fb_id',191)->nullable();
//            $table->string('vk_id',191)->nullable();
//
//            $table->string('email',191)->nullable();
//            $table->boolean('active')->nullable();
//            $table->boolean('admin')->nullable();
//            $table->string('password',191);
//            $table->string('auth_token',32)->nullable();
//            $table->string('access_token',32)->nullable();
//            $table->integer('access_token_expired')->nullable();
//            $table->string('confirm_email_token',32)->nullable();
//            $table->string('restore_password_token',32)->nullable();
//
//            $table->smallInteger('birthday_year')->nullable();
//            $table->smallInteger('height')->nullable();
//            $table->smallInteger('weight')->nullable();
//            $table->smallInteger('waist_girth')->nullable();
//            $table->smallInteger('hip_girth')->nullable();
//
//            $table->rememberToken();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('users');
    }
}

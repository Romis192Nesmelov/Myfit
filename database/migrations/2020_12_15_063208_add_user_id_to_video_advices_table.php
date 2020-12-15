<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToVideoAdvicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_advice', function (Blueprint $table) {
            $table->bigInteger('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_advice', function (Blueprint $table) {
            $table->dropForeign('video_advice_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}

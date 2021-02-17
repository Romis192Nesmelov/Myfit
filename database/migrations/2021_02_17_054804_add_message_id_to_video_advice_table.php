<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageIdToVideoAdviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_advice', function (Blueprint $table) {
            $table->bigInteger('message_id', false, true)->nullable();
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign('video_advice_message_id_foreign');
            $table->dropColumn('message_id');
        });
    }
}

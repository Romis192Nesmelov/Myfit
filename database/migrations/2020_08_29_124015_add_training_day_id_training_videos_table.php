<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainingDayIdTrainingVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_videos', function (Blueprint $table) {
            $table->bigInteger('training_day_id', false, true);
            $table->foreign('training_day_id')->references('id')->on('training_days')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_videos', function (Blueprint $table) {
            $table->dropForeign('training_videos_training_day_id_foreign');
            $table->dropColumn('training_day_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainingIdToTrainingDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_descriptions', function (Blueprint $table) {
            $table->bigInteger('training_id', false, true);
            $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_descriptions', function (Blueprint $table) {
            $table->dropForeign('training_descriptions_training_id_foreign');
            $table->dropColumn('training_id');
        });
    }
}

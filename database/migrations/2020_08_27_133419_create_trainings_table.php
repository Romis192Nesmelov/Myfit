<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo',191);
            $table->smallInteger('complexity');
            $table->smallInteger('duration');
            $table->string('periodicity',191);
            $table->string('equipment',191);
            $table->smallInteger('need_previous_completed');
            
            $table->string('warning_title',191);
            $table->text('warning_description');
            $table->string('recommendation_title',191);
            $table->text('recommendation_description');

            $table->string('warmup_warning_title',191)->nullable();
            $table->text('warmup_warning_description')->nullable();
            $table->string('warmup_recommendation_title',191)->nullable();
            $table->text('warmup_recommendation_description')->nullable();

            $table->string('main_warning_title',191);
            $table->text('main_warning_description');
            $table->string('main_recommendation_title',191);
            $table->text('main_recommendation_description');

            $table->string('main_cardio_title',191)->nullable();
            $table->text('main_cardio_description')->nullable();

            $table->string('hitch_warning_title',191)->nullable();
            $table->text('hitch_warning_description')->nullable();
            $table->string('hitch_recommendation_title',191)->nullable();
            $table->text('hitch_recommendation_description')->nullable();
            
            $table->boolean('with_cardio');
            $table->boolean('its_cardio');
            $table->integer('price');
            $table->boolean('active');
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
        Schema::dropIfExists('trainings');
    }
}
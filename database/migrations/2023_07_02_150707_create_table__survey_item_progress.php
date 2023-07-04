<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSurveyItemProgress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SurveyItemProgress', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('intervention_id')->index();
            $table->bigInteger('item_id')->index();
            $table->bigInteger('surveys_id')->index();
            $table->datetime("date_survey")->index();
            $table->decimal("progress", 8, 2)->index();
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
        Schema::dropIfExists('SurveyItemProgress');
    }
}

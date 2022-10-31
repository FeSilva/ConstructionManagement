<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProtocolSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocol_surveys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('protocol_id')->unsigned()->nullable();
            $table->foreign('protocol_id')->references('id')->on('protocol');
            $table->bigInteger('survey_id')->unsigned()->nullable();
            $table->foreign('survey_id')->references('id')->on('surveys');
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
        Schema::dropIfExists('protocol_surveys');
    }
}

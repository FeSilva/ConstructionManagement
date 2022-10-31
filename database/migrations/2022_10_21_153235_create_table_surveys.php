<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('intervention_id')->unsigned()->nullable();
            $table->foreign('intervention_id')->references('id')->on('intervention_process');
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types_inspections');
            $table->bigInteger('progress_id')->unsigned()->nullable();
            $table->foreign('progress_id')->references('id')->on('surveys_progress');
            $table->bigInteger('owner_id')->unsigned()->nullable();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->bigInteger('rhythms_id')->unsigned()->nullable();
            $table->foreign('rhythms_id')->references('id')->on('inspections_rhythms');
            
            $table->string("program")->nullable();

            $table->string("intervention_code")->nullable();
            $table->string("building_code")->nullable();
            $table->date("date_close");
            $table->date("inspection_date");
            $table->string("budget_number")->nullable();;
            $table->string("archive")->nullable();
            $table->string("name_archive")->nullable();
            $table->integer("employess")->nullable();
            $table->string("status");
            $table->decimal("physical_progress",10,2);
            $table->integer("merge")->default(0);
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
        Schema::dropIfExists('surveys');
    }
}

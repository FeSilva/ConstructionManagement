<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMeansurent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meansurent', function (Blueprint $table) {
            $table->id();
            $table->integer('user_by')->index();
            $table->string("name")->index();
            $table->integer('bound_total')->index();
            $table->date("start_date")->index();
            $table->date("end_date")->index();
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
        Schema::dropIfExists('meansurent');
    }
}

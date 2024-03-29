<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTypesInspection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types_inspections', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("sigla");
            $table->enum("status",[1,0]);
            $table->integer('price');
            $table->integer("amount_to_receive");
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
        Schema::dropIfExists('types_inspections');
    }
}

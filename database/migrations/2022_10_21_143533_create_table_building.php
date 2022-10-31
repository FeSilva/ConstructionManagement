<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBuilding extends Migration
{
    /**
     * Run the migrations.
     *  
     * @return void
     */
    public function up()
    {
        Schema::create('building', function (Blueprint $table) {
            $table->id();
            $table->string("codigo");
            $table->string("name");
            $table->string("endereco");
            $table->string("diretoria");
            $table->string("municipio");
            $table->string("bairro");
            $table->string("telefone");
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
        Schema::dropIfExists('building');
    }
}

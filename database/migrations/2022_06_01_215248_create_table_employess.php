<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmployess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employess', function (Blueprint $table) {
            $table->increments('employess_id');
            $table->integer('company_id');
            $table->integer('positions_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->decimal('earnings', 2);
            $table->char('types_of_earnings');
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
        Schema::dropIfExists('employess');
    }
}

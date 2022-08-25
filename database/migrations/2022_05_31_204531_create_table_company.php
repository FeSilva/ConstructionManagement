<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('company_id');
            $table->integer('responsible_id');
            $table->string('social_reason');
            $table->string('fantasy_name');
            $table->integer('zipcode');
            $table->char('city');
            $table->char('country');
            $table->char('complement');
            $table->integer('annual_billing');
            $table->integer('employess');
            $table->string('tax_id1');
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
        Schema::drop('company');
    }
}

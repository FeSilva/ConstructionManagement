<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableShippingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->index();
            $table->bigInteger('type_id')->index();
            $table->string("code");
            $table->integer("month");
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
        Schema::dropIfExists('shipping_lists');
    }
}

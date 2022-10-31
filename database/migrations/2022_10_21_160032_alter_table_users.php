<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('code_fde')->after("email")->nullable();
            $table->string("company")->after("code_fde")->default("JHE");
            $table->string("personal_email")->after("company")->nullable();
            $table->string("phone")->after("personal_email")->nullable();
            $table->string("professional_phone")->after("phone")->nullable();
            $table->string("observations")->after("professional_phone")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('code_fde');
            $table->dropColumn("company");
            $table->dropColumn("personal_email");
            $table->dropColumn("phone");
            $table->dropColumn("professional_phone");
            $table->dropColumn("observations");
        });
    }
}

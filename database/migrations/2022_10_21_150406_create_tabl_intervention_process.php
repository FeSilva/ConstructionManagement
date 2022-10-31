<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablInterventionProcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention_process', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contractor_id');
            $table->foreign('contractor_id')->references('id')->on('contractors');
            $table->unsignedBigInteger('building_id');
            $table->foreign('building_id')->references('id')->on('building');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("code");
            $table->string("programa");
            $table->string("type_of_work"); //tipo_obra
            $table->string("rv");
            $table->string("type_of_contract"); //tipo_contrato
            $table->string("company_name"); //nome_empresa
            $table->string("number_contract"); //nome_empresa
            $table->string("contractors_name"); //nome_contratada
            $table->string("number_os"); //nome_contratada

            $table->string("social_management_number"); //numero_gestao_social
            $table->string("description"); //numero_gestao_social
            $table->string("total_price"); //valor_total
            $table->string("discount"); //disconto
            $table->string("total_term"); //prazo_total
            $table->string("pi_object"); //objecto_pi
            $table->string("count_vistoria"); //qtde_vistoria_mes
            $table->date("signature Date");

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
        Schema::dropIfExists('intervention_process');
    }
}

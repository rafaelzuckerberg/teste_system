<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('cnpj');
            $table->string('responsavel_nome')->nullable();
            $table->string('responsavel_telefone')->nullable();
            $table->string('responsavel_celular')->nullable();
            $table->string('responsavel_email')->nullable();
            $table->string('responsavel2_nome')->nullable();
            $table->string('responsavel2_telefone')->nullable();
            $table->string('responsavel2_celular')->nullable();
            $table->string('responsavel2_email')->nullable();
            
            $table->string('valor_cliente_parecer')->nullable();
            $table->string('valor_fornecedor_parecer')->nullable();
            $table->string('valor_cliente_negociacao')->nullable();
            $table->string('valor_proposto_negociacao')->nullable();
            $table->string('valor_negociado_negociacao')->nullable();
            $table->string('valor_negociadoC_negociacao')->nullable();
            $table->string('complemento_endereco')->nullable();
            $table->string('numero')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
} 
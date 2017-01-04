<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cpf',14)->nullable();
            $table->string('nome');
            $table->string('endereco',100);
            $table->string('bairro',100)->nullable();
            $table->string('cidade',100)->nullable();
            $table->string('uf',3)->nullable();
            $table->string('cep',12)->nullable();

            $table->string('fone',40);
            $table->string('contato')->nullable();
            $table->string('email')->nullable();

            $table->string('fone2',40)->nullable();
            $table->string('contato2')->nullable();
            $table->string('email2')->nullable();

            $table->string('tipo')->nullable();
            $table->text('obs')->nullable();
            $table->text('historico')->nullable();

            $table->string('estado_id')->default(0);
            $table->foreign('estado_id')->references('id')->on('estados');



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
        Schema::dropIfExists('clientes');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref')->nullable();
            $table->string('notafiscal')->nullable();

            $table->timestamp('dataentrada');
            $table->timestamp('garantia')->nullable();

            $table->integer('qtd');
            $table->integer('qtdcompra');
            $table->integer('ativo')->default(1);

            $table->text('obs')->nullable();
            $table->text('historico')->nullable();

            $table->integer('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->integer('comprapedido_id')->nullable();
            $table->foreign('comprapedido_id')->references('id')->on('comprapedidos');

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
        Schema::dropIfExists('compras');
    }
}

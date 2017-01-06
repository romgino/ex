<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprapedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprapedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref')->nullable();
            $table->integer('qtd');
            $table->integer('pendente')->default(1);
            $table->text('obs')->nullable();
            $table->text('historico')->nullable();

            $table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipos');

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
        Schema::dropIfExists('comprapedidos');
    }
}

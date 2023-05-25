<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocacaoFilmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacao_filmes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_locacao')->unsigned();
            $table->foreign('id_locacao')->references('id')->on('locacaos');
            $table->integer('id_filme')->unsigned();
            $table->foreign('id_filme')->references('id')->on('filmes');
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
        Schema::dropIfExists('locacao_filmes');
    }
}

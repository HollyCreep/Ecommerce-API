<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia');
            $table->string('descricao');
            $table->double('preco', 8, 2);
            $table->integer('ratings');
            $table->integer('reviews');
            $table->integer('isAddedToCart');
            $table->integer('isAddedBtn');
            $table->integer('isFavourite');
            $table->integer('categoria');
            $table->double('promocao', 8, 2);
            $table->string('genero');
            $table->string('cabedal');
            $table->string('solado');
            $table->string('altura_salto');
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
        Schema::dropIfExists('produtos');
    }
}

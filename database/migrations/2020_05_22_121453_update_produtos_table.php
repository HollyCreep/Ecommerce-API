<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('grade');
            $table->integer('categoria');
            $table->double('promocao', 8, 2);
            $table->string('genero');
            $table->string('cabedal');
            $table->string('solado');
            $table->string('altura_salto');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('grade');
            $table->dropColumn('categoria');
            $table->doubdropColumnle('promocao');
            $table->dropColumn('genero');
            $table->dropColumn('cabedal');
            $table->dropColumn('solado');
            $table->dropColumn('altura_salto');
        });
    }
}

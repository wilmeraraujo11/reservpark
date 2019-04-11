<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParqueaderoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueadero_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_parqueadero')->unsigned();
            $table->integer('id_usuario')->unsigned();

            $table->index(["id_usuario"], 'fk_parqueadero_has_usuario_usuario1_idx');

            $table->index(["id_parqueadero"], 'fk_parqueadero_has_usuario_parqueadero1_idx');


            $table->foreign('id_parqueadero')->references('id')->on('parqueadero')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_usuario')->references('id')->on('usuario')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('parqueadero_user');
    }
}

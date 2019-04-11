<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('no_documento', 15);
            $table->string('name', 50);
            $table->string('ape', 50);
            $table->string('dir', 50);
            $table->string('tel', 15);
            $table->string('email', 50)->unique();
            $table->string('password', 191)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->integer('id_tdoc')->unsigned();
            $table->integer('id_gen')->unsigned();
            $table->integer('id_rol')->unsigned();

            $table->index(["id_rol"], 'fk_usuario_rol_idx');

            $table->index(["id_tdoc"], 'fk_usuario_tdoc_idx');

            $table->index(["id_gen"], 'fk_usuario_genero_idx');

            $table->unique(["password"], 'password_UNIQUE');

            $table->unique(["no_documento"], 'no_documento_UNIQUE');

            $table->foreign('id_tdoc', 'fk_usuario_tdoc_idx')
                ->references('id')->on('tipo_documento')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_gen', 'fk_usuario_genero_idx')
                ->references('id')->on('genero')
                ->onDelete('no action')
                ->onUpdate('no action');     

            $table->foreign('id_rol', 'fk_usuario_rol_idx')
                ->references('id')->on('rol')
                ->onDelete('no action')
                ->onUpdate('no action'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}

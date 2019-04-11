<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'reserva';

    /**
     * Run the migrations.
     * @table reserva
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->time('hora_inicio');
            $table->date('fecha_fin')->nullable();
            $table->time('hora_fin')->nullable();
            $table->integer('piso_id')->unsigned();
            $table->integer('cupo_id')->unsigned();
            $table->integer('parqueadero_id')->unsigned();
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["parqueadero_id"], 'fk_reserva_parqueadero1_idx');
            $table->index(["vehiculo_id"], 'fk_reserva_vehiculo_idx');


            $table->foreign('parqueadero_id', 'fk_reserva_parqueadero1_idx')
                ->references('id')->on('parqueadero')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('vehiculo_id', 'fk_reserva_vehiculo1_idx')
                ->references('id')->on('vehiculo')
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
       Schema::dropIfExists($this->set_schema_table);
     }
}

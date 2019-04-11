<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoVehiculoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ingreso_vehiculo';

    /**
     * Run the migrations.
     * @table ingreso_vehiculo
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida')->nullable();
            $table->time('hora_ingreso');
            $table->time('hora_salida')->nullable();
            $table->integer('vr_factura')->nullable();
            $table->string('novedades', 50)->nullable();
            $table->integer('id_usuario');
            $table->integer('piso_id')->unsigned();
            $table->integer('cupo_id')->unsigned();
            $table->integer('id_parqueadero')->unsigned();
            $table->integer('vehiculo_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["id_parqueadero"], 'fk_ingreso_vehiculo_parqueadero1_idx');
            $table->index(["vehiculo_id"], 'fk_ingreso_vehiculo_vehiculo1_idx');


            $table->foreign('id_parqueadero', 'fk_ingreso_vehiculo_parqueadero1_idx')
                ->references('id')->on('parqueadero')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('vehiculo_id', 'fk_ingreso_vehiculo_vehiculo1_idx')
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

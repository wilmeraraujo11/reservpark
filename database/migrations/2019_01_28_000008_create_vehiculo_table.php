<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'vehiculo';

    /**
     * Run the migrations.
     * @table vehiculo
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('placa', 7);
            $table->string('color', 50);
            $table->integer('id_marca')->unsigned();
            $table->integer('id_tipo_vehiculo')->unsigned();
            $table->rememberToken();
            $table->timestamps(); 
            
            $table->index(["id_tipo_vehiculo"], 'fk_vehiculo_tipo_vehiculo1_idx');
            
            $table->index(["id_marca"], 'fk_vehiculo_marca_idx');

            $table->unique(["placa"], 'placa_UNIQUE');


            $table->foreign('id_marca', 'fk_vehiculo_marca1_idx')
                ->references('id')->on('marca_vehiculo')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_tipo_vehiculo', 'fk_vehiculo_tipo_vehiculo1_idx')
                ->references('id')->on('tipo_vehiculo')
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

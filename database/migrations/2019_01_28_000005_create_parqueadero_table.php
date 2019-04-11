<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParqueaderoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'parqueadero';

    /**
     * Run the migrations.
     * @table parqueadero
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('direccion', 50);
            $table->string('telefono', 10);
            $table->string('nit', 15);
            $table->string('rut', 15);
            $table->string('longitud', 30);
            $table->string('latitud', 30);
            $table->integer('id_tipo_park')->unsigned();
            $table->integer('id_ubicacion')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["id_tipo_park"], 'fk_parqueadero_tipo_park1_idx');

            $table->index(["id_ubicacion"], 'fk_parqueadero_ubicacion1_idx');


            $table->foreign('id_tipo_park', 'fk_parqueadero_tipo_park1_idx')
                ->references('id')->on('tipo_park')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_ubicacion', 'fk_parqueadero_ubicacion1_idx')
                ->references('id')->on('ubicacion')
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

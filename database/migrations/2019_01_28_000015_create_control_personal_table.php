<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlPersonalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'control_personal';

    /**
     * Run the migrations.
     * @table control_personal
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
            $table->integer('id_usuario');
            $table->integer('parqueadero_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["parqueadero_id"], 'fk_control_personal_parqueadero1_idx');


            $table->foreign('parqueadero_id', 'fk_control_personal_parqueadero1_idx')
                ->references('id')->on('parqueadero')
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

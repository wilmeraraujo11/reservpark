<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'horario';

    /**
     * Run the migrations.
     * @table horario
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 30);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('tipo_horario', 1);
            $table->string('desc_tipo_horario', 30);
            $table->integer('id_parqueadero')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["id_parqueadero"], 'fk_horario_atencion_parqueadero1_idx');


            $table->foreign('id_parqueadero', 'fk_horario_atencion_parqueadero1_idx')
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

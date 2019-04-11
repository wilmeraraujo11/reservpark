<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNominaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'nomina';

    /**
     * Run the migrations.
     * @table nomina
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('horas_laboradas')->nullable();
            $table->integer('vr_pagar')->nullable();
            $table->integer('descuentos')->nullable();
            $table->integer('id_parqueadero')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["id_parqueadero"], 'fk_nomina_parqueadero1_idx');


            $table->foreign('id_parqueadero', 'fk_nomina_parqueadero1_idx')
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tarifa';

    /**
     * Run the migrations.
     * @table tarifa
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
            $table->integer('valor_id')->unsigned();
            $table->integer('adicional_id')->unsigned();
            $table->integer('parqueadero_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["parqueadero_id"], 'fk_tarifa_parqueadero1_idx');
            
            $table->index(["valor_id"], 'fk_tarifa_valor1_idx');

            $table->index(["adicional_id"], 'fk_tarifa_adicional1_idx');

            $table->foreign('parqueadero_id', 'fk_tarifa_parqueadero1_idx')
                ->references('id')->on('parqueadero')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('valor_id', 'fk_tarifa_valor1_idx')
                ->references('id')->on('valor_tarifa')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('adicional_id', 'fk_tarifa_adicional1_idx')
                ->references('id')->on('adicional_vr_tarifa')
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cupo';

    /**
     * Run the migrations.
     * @table cupo
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 3);
            $table->string('estado', 1);
            $table->string('desc_estado', 30);
            $table->integer('piso_id')->unsigned();
            $table->integer('parqueadero_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["piso_id"], 'fk_cupo_piso1_idx');


            $table->foreign('piso_id', 'fk_cupo_piso1_idx')
                ->references('id')->on('piso')
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

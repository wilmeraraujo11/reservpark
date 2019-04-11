<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePisoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'piso';

    /**
     * Run the migrations.
     * @table piso
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre', 1);
            $table->integer('parqueadero_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index(["parqueadero_id"], 'fk_piso_parqueadero1_idx');


            $table->foreign('parqueadero_id', 'fk_piso_parqueadero1_idx')
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

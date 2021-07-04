<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Residuos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residuos', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('categoria');
            $table->string('tecnologia');
            $table->string('classe');
            $table->enum('un_medida', ['kg','ton','un']);
            $table->float('peso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

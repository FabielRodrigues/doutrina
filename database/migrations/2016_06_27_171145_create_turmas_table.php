<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ciclos_id')->unsigned();
            $table->foreign('ciclos_id')->references('id')->on('ciclos')->onDelete('cascade');
            $table->string('turma');
            $table->string('horario');
            $table->string('dia');
            $table->integer('ano');
            $table->integer('sala');
            $table->integer('vagas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('turmas');
    }
}

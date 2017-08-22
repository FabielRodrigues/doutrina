<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_turmas', function (Blueprint $table) {
            $table->integer('users_id')->unsigned();
            $table->integer('turmas_id')->unsigned();

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('turmas_id')->references('id')->on('turmas');

            $table->timestamps();
            $table->softDeletes();

            $table->primary(['users_id', 'turmas_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_turmas');
    }
}

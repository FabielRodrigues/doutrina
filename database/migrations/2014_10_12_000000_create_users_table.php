<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('default.jpg');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users_parents', function (Blueprint $table){

            $table->integer('users_id')->unsigned();
            $table->integer('users_id2')->unsigned();
            $table->string('parents');

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('users_id2')->references('id')->on('users');

            $table->primary(['users_id', 'users_id2']);
        });


        Schema::create('logs', function(Blueprint $table){
            $table->increments('id');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');

            $table->date('date');
            $table->text('action');

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
        Schema::drop('users');
    }
}

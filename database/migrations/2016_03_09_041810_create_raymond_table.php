<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRaymondTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // you can also set index, foreign key, primary key and many more in
        // https://laravel.com/docs/5.2/migrations

        Schema::create('raymond', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('airline');
            $table->timestamps();
        });

        Schema::create('raymond2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('raymond')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // drop foreign key first
        Schema::table('raymond2', function ($table) {
             $table->dropForeign(['user_id']);
        });

        Schema::drop('raymond');
        Schema::drop('raymond2');
    }
}

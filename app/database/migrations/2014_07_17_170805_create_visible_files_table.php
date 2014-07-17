<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisibleFilesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visible_files', function($table){
            $table->increments('id');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->integer('file_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->boolean('visible');

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
        Schema::drop('visible_files');
    }

}

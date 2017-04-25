<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('images', function($table)
        {
            $table->increments('id');

            $table->string('imageUrl');
            //$table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            //$table->integer('offer_id')->unsigned();


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
        Schema::drop('images');
	}

}

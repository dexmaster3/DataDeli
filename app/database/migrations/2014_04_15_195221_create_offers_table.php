<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('offers', function($table)
        {
            $table->increments('id');

            $table->string('offerName', 200);
            $table->integer('network_id')->unsigned();
            $table->string('subjectLines');
            $table->string('fromLine', 200);
            $table->string('friendlyFromLines');
            $table->string('affiliateLink', 500);
            $table->string('offerUnsubscribe', 200);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('user_id')->unsigned();

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
        Schema::drop('offers');
	}

}

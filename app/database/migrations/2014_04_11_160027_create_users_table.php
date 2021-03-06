<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');

			$table->string('email')->unique();
			$table->string('password');
            $table->boolean('activated');
            $table->string('activation_guid');
            $table->dateTime('activation_mail_sent');
            $table->integer('role');
            $table->integer('parent_id')->unsigned();

            $table->string('remember_token', 100);

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

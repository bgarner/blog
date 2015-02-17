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
			$table->increments('id')->index();
			$table->string('email')->unique();
			$table->string('username')->unique();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('password');
			$table->string('remember_token');
			$table->integer('role')->references('id')->on('roles');
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
		Schema::drop("users");
	}

}

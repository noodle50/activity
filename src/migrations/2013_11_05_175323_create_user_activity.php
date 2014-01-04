<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActivity extends Migration {

	public function up() {
		Schema::create('user_activity', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('group', 32);
			$table->string('type', 32);
			$table->string('action', 64);
			$table->text('data')->nullable()->default(null);
			$table->string('ip_address', 64);
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('user');
		});
	}

	public function down() {
		Schema::drop('user_activity');
	}

}
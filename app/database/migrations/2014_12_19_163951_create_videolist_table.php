<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideolistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Video List Table
		Schema::create('videolist', function($table)
        {
                $table->increments('id');
                $table->string('name');
				$table->string('desc',255);
				$table->string('url', 550);
				$table->boolean('active')->default(1);
				$table->integer('updatedby');
				$table->integer('position');
				$table->string('thumb', 550);
				$table->string('length');
				$table->integer('schedule_id');

				// created_at, updated_at DATETIME
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
		// Drop Video List Table
		Schema::drop('videolist');
	}

}

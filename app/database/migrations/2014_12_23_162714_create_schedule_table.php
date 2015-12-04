<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create Schedule Table
		Schema::create('schedule', function($table)
        {
                $table->increments('id');
                $table->string('name');
				$table->text('desc');
				$table->date('start_date');
				$table->date('end_date');
				$table->boolean('active')->default(0);
				$table->integer('updatedby');

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
		// Drop Schedule Table
		Schema::drop('schedule');
	}

}

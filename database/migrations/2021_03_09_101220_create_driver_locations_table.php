<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateDriverLocationsTable.
 */
class CreateDriverLocationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_locations', function(Blueprint $table) {
            $table->increments('id');
			$table->string('driver_id');
			$table->string('latitude');
			$table->string('longitude');
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
		Schema::drop('driver_locations');
	}
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create or remove a ‘parties’ table from the database.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class CreatePartiesTable extends Migration
{
    /**
     * Create the table.
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {

            // Primary key.
            // An unsigned integer with autoincrement.
            $table->increments('id');

            // Main data.
            $table->string('name');
            $table->string('abbreviation')->unique();
            $table->date('founded_on');
            $table->date('dissolved_on')->nullable();
        });
    }

    /**
     * Destroy the table.
     */
    public function down()
    {
        Schema::drop('parties');
    }
}

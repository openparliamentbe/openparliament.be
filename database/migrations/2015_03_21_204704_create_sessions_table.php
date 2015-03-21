<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create or remove a ‘sessions’ table from the database.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class CreateSessionsTable extends Migration
{
    /**
     * Create the table.
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {

            // Primary key.
            // An unsigned integer with autoincrement.
            $table->increments('id');

            // Foreign key.
            // The legislature a session belongs to.
            $table->string('legislature_id', 3);

            // Main data.
            $table->date('started_on');
            $table->date('ended_on')->nullable();
            $table->boolean('extraordinary');

            // Set the foreign key index.
            $table->foreign('legislature_id')
                  ->references('id')->on('legislatures');
        });
    }

    /**
     * Destroy the table.
     */
    public function down()
    {
        Schema::drop('sessions');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create or remove a ‘legislatures’ table from the database.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class CreateLegislaturesTable extends Migration
{
    /**
     * Create the table.
     */
    public function up()
    {
        Schema::create('legislatures', function (Blueprint $table) {

            // Primary key.
            // A unique code identifying the legislature.
            $table->string('id', 3)->primary();

            // Foreign key.
            // The parliament a legislature belongs to.
            $table->char('parliament_id', 1);

            // Main data.
            $table->date('started_on');
            $table->date('ended_on')->nullable();

            // Set the foreign key index.
            $table->foreign('parliament_id')
                  ->references('id')->on('parliaments');
        });
    }

    /**
     * Destroy the table.
     */
    public function down()
    {
        Schema::drop('legislatures');
    }
}

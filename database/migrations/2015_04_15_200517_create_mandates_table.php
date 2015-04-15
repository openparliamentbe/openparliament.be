<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create or remove a ‘mandates’ table from the database.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class CreateMandatesTable extends Migration
{
    /**
     * Create the table.
     */
    public function up()
    {
        Schema::create('mandates', function (Blueprint $table) {

            // Primary key.
            // An unsigned integer with autoincrement.
            $table->increments('id');

            // Foreign keys.
            // The legislature of the mandate.
            $table->string('legislature_id', 3);
            // The politician a mandate belongs to.
            $table->unsignedInteger('politician_id');

            // Main data.
            $table->enum('type', ['k', 's']);
            $table->enum('lang', ['de', 'fr', 'nl']);
            $table->string('original_identifier')->nullable();
            $table->string('email')->nullable();
            $table->date('started_on');
            $table->date('ended_on')->nullable();

            // Creation and modification timestamps.
            $table->timestamps();

            // Set the foreign key indices.
            $table->foreign('legislature_id')
                  ->references('id')->on('legislatures');
            $table->foreign('politician_id')
                  ->references('id')->on('politicians');
        });
    }

    /**
     * Destroy the table.
     */
    public function down()
    {
        Schema::drop('mandates');
    }
}

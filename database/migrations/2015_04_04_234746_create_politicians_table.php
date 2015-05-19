<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create or remove a ‘politicians’ table from the database.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class CreatePoliticiansTable extends Migration
{
    /**
     * Create the table.
     */
    public function up()
    {
        Schema::create('politicians', function (Blueprint $table) {

            // Primary key.
            // An unsigned integer with autoincrement.
            $table->increments('id');

            // Foreign key.
            // The party a politician belongs to.
            $table->unsignedInteger('party_id');

            // Main data.
            $table->string('given_name');
            $table->string('surname');
            $table->enum('gender', ['m', 'f']);
            $table->enum('lang', ['de', 'fr', 'nl']);
            $table->string('email')->nullable()->unique();
            $table->date('born_on')->nullable();
            $table->date('dead_on')->nullable();

            // Creation and modification timestamps.
            $table->timestamps();

            // Set the foreign key index.
            $table->foreign('party_id')
                  ->references('id')->on('parties');
        });
    }

    /**
     * Destroy the table.
     */
    public function down()
    {
        Schema::drop('politicians');
    }
}

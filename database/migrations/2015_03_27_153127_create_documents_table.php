<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create or remove a ‘documents’ table from the database.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class CreateDocumentsTable extends Migration
{
    /**
     * Create the table.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {

            // Primary key.
            // An unsigned integer with autoincrement.
            $table->increments('id');

            // Foreign key.
            // The dossier a document belongs to.
            $table->unsignedInteger('dossier_id');

            // Main data.
            // Official identification number.
            $table->string('number', 10)->unique();
            // Dates that are relevant to the parliamentary procedure.
            $table->date('submitted_on')->nullable();
            $table->date('distributed_on')->nullable();

            // Creation and modification timestamps.
            $table->timestamps();

            // Set the foreign key index.
            $table->foreign('dossier_id')
                  ->references('id')->on('dossiers');
        });
    }

    /**
     * Destroy the table.
     */
    public function down()
    {
        Schema::drop('documents');
    }
}

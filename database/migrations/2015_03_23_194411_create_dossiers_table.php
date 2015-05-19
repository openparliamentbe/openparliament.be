<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Create or remove a ‘dossiers’ table from the database.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class CreateDossiersTable extends Migration
{
    /**
     * A dictionary of types of dossiers.
     *
     * @var array
     */
    protected $dossierTypes = [
        'AMENDMENT',
        'COMMUNICATION_TO_PARLIAMENT',
        'CONCERTATION_COMMITTEE_DECISION',
        'CONSTITUTIONAL_REVISION_PROPOSAL',
        'DECLARATION_PROPOSAL',
        'ELECTIONS',
        'LAW_PROPOSAL',
        'OPINION_COUNCIL_OF_STATE',
        'REPORT',
        'RESOLUTION_PROPOSAL',
        'TABLE_OR_LIST',
    ];

    /**
     * A dictionary of global dossier statuses.
     *
     * @var array
     */
    protected $dossierStatuses = [
        'PENDING',
        'REMOVED',
        'VOID',
    ];

    /**
     * Create the table.
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {

            // Primary key.
            // An unsigned integer with autoincrement.
            $table->increments('id');

            // Foreign key.
            // The session a dossier belongs to.
            $table->unsignedInteger('session_id');

            // Main data.
            // Official identification numbers.
            $table->string('number', 7)->unique();
            $table->string('bicameral_number', 30)->nullable()->unique();
            // Names.
            $table->string('title_fr', 500);
            $table->string('title_nl', 500);
            $table->string('short_title_fr');
            $table->string('short_title_nl');
            // Metadata.
            $table->enum('type', $this->dossierTypes);
            $table->enum('status', $this->dossierStatuses);
            $table->string('constitutional_article', 3);
            // Dates that are relevant to the parliamentary procedure.
            $table->date('submitted_on')->nullable();
            $table->date('considered_on')->nullable();
            $table->date('distributed_on')->nullable();
            $table->date('sent_on')->nullable();

            // Creation and modification timestamps.
            $table->timestamps();

            // Set the foreign key index.
            $table->foreign('session_id')
                  ->references('id')->on('sessions');
        });
    }

    /**
     * Destroy the table.
     */
    public function down()
    {
        Schema::drop('dossiers');
    }
}

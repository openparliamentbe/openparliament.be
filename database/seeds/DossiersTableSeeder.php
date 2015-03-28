<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Seed the ‘dossiers’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class DossiersTableSeeder extends Seeder
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
     * Run the seeder.
     */
    public function run()
    {
        $fakerFr = Faker::create('fr_FR');
        $fakerNl = Faker::create('nl_BE');

        // Seed the generators so that they always produce the same fake data.
        $fakerFr->seed(2015);
        $fakerNl->seed(2015);

        $data = [];

        foreach (range(1, 250) as $index) {
            $number = str_pad($index, 4, '0', STR_PAD_LEFT);

            $data[] = [
                'session_id' => 1,
                'number' => '54K'.$number,
                'bicameral_number' => "00/000-K{$number}/001-20XX/20XX-0",
                'title_fr' => $fakerFr->sentence(10),
                'title_nl' => $fakerNl->sentence(10),
                'short_title_fr' => strtoupper($fakerFr->words(4, true)),
                'short_title_nl' => strtoupper($fakerNl->words(4, true)),
                'type' => $fakerFr->randomElement($this->dossierTypes),
                'status' => $fakerFr->randomElement($this->dossierStatuses),
                'constitutional_article' => '78',
                'submitted_on' => $fakerFr->dateTimeBetween('1 year ago', 'now'),
                'considered_on' => $fakerFr->dateTimeBetween('11 months ago', 'now'),
                'distributed_on' => $fakerFr->dateTimeBetween('11 months ago', 'now'),
                'sent_on' => $fakerFr->dateTimeBetween('10 months ago', 'now'),
            ];
        }

        DB::table('dossiers')->insert($data);
    }
}

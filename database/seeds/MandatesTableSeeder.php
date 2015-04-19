<?php

use Illuminate\Database\Seeder;

/**
 * Seed the ‘mandates’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class MandatesTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $data = [
            [
                'legislature_id'      => '54k',
                'politician_id'       => 1,
                'type'                => 'k',
                'lang'                => 'de',
                'original_identifier' => null,
                'email'               => 'philipp.vonkatze@lachambre.dev',
                'started_on'          => '2014-06-19',
                'ended_on'            => null,
            ],
            [
                'legislature_id'      => '54k',
                'politician_id'       => 2,
                'type'                => 'k',
                'lang'                => 'fr',
                'original_identifier' => null,
                'email'               => 'philippe.lechat@lachambre.dev',
                'started_on'          => '2014-06-19',
                'ended_on'            => null,
            ],
            [
                'legislature_id'      => '54k',
                'politician_id'       => 3,
                'type'                => 'k',
                'lang'                => 'nl',
                'original_identifier' => null,
                'email'               => 'filip.vandekat@lachambre.dev',
                'started_on'          => '2014-06-19',
                'ended_on'            => null,
            ],
        ];

        DB::table('mandates')->insert($data);
    }
}

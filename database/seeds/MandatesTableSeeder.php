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
        // Start by adding a few hardcoded mandates.
        // Then, add a bunch of generated ones.
        $data = array_merge(
            $this->getHardcodedData(),
            $this->generateCurrentChamberMandates()
        );

        DB::table('mandates')->insert($data);
    }

    /**
     * Provide an array of hardcoded mandates data.
     *
     * @return array
     */
    protected function getHardcodedData()
    {
        return [
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
    }

    /**
     * Generate an array of currently valid mandates for the Chamber.
     *
     * @return array
     */
    protected function generateCurrentChamberMandates()
    {
        $data = [];
        $counter = 4;

        foreach (range(4, 500) as $index) {
            // We will leave some politicians without any mandate.
            if (
                // Skipped NL politicians
                $index > 92 && $index <= 300
                // Skipped FR politicians
                || $index > 356 && $index <= 480
                // Skipped DE politicians
                || $index > 482
            ) {
                continue;
            }

            $lang = 'nl';
            if ($index > 300) $lang = 'fr';
            if ($index > 480) $lang = 'de';

            $data[] = [
                'legislature_id'      => '54k',
                'politician_id'       => $index,
                'type'                => 'k',
                'lang'                => $lang,
                'original_identifier' => null,
                'email'               => 'mandate'.($counter++).'@lachambre.dev',
                'started_on'          => '2014-06-19',
                'ended_on'            => null,
            ];
        }

        return $data;
    }
}

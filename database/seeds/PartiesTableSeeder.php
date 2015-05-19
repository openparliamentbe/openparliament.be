<?php

use Illuminate\Database\Seeder;

/**
 * Seed the ‘̛̛parties’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class PartiesTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $data = [
            // A few ‘normal’ parties.
            [
                'name'         => 'Cats',
                'abbreviation' => 'CAT',
                'founded_on'   => '1870-01-01',
                'dissolved_on' => null,
            ],
            [
                'name'         => 'Dogs',
                'abbreviation' => 'DOG',
                'founded_on'   => '1960-01-01',
                'dissolved_on' => null,
            ],
            [
                'name'         => 'Unicorns',
                'abbreviation' => 'UNI',
                'founded_on'   => '1920-01-01',
                'dissolved_on' => null,
            ],
            // A party with several words in his official name. This is
            // probably the most common case in the real world.
            [
                'name'         => 'Rainbow Fish Party',
                'abbreviation' => 'RFP',
                'founded_on'   => '1950-01-01',
                'dissolved_on' => null,
            ],
            // A dissolved party.
            [
                'name'         => 'Original League of Dolphins',
                'abbreviation' => 'OLD',
                'founded_on'   => '1950-01-01',
                'dissolved_on' => '1995-01-01',
            ],
        ];

        DB::table('parties')->insert($data);
    }
}

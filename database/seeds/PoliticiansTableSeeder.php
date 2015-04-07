<?php

use Illuminate\Database\Seeder;

/**
 * Seed the ‘politicians’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class PoliticiansTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $data = [
            [
                'party_id'   => 1,
                'given_name' => 'Philipp',
                'surname'    => 'Von Katze',
                'gender'     => 'm',
                'lang'       => 'de',
                'email'      => 'philipp.vonkatze@example.dev',
                'born_on'    => '1975-01-01',
                'dead_on'    => null,
            ],
            [
                'party_id'   => 1,
                'given_name' => 'Philippe',
                'surname'    => 'Lechat',
                'gender'     => 'm',
                'lang'       => 'fr',
                'email'      => 'philippe.lechat@example.dev',
                'born_on'    => '1975-01-01',
                'dead_on'    => null,
            ],
            [
                'party_id'   => 1,
                'given_name' => 'Filip',
                'surname'    => 'Van De Kat',
                'gender'     => 'm',
                'lang'       => 'nl',
                'email'      => 'filip.vandekat@example.dev',
                'born_on'    => '1975-01-01',
                'dead_on'    => null,
            ],
        ];

        DB::table('politicians')->insert($data);
    }
}

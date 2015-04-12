<?php

use Faker\Factory as Faker;
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
        $fakerFr = Faker::create('fr_BE');
        $fakerNl = Faker::create('nl_BE');

        // Seed the generators so that they always produce the same fake data.
        $fakerFr->seed(2015);
        $fakerNl->seed(2015);

        // Start by adding a few hardcoded politicians.
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

        // Then, add some random politicians data.
        foreach (range(4, 150) as $index) {

            // By default, generate data for Dutch-speaking politicians.
            $faker = $fakerNl;
            $lang  = 'nl';

            // At some point, start making data for French-speaking ones instead.
            if ($index > 90) {
                $faker = $fakerFr;
                $lang  = 'fr';
            }

            $gender     = $faker->randomElement(['male', 'female']);
            $given_name = $faker->firstname($gender);
            $surname    = $faker->lastname;

            $email = "{$given_name}.{$surname}@example.dev";

            $data[] = [
                'party_id'   => $faker->numberBetween(1, 5),
                'given_name' => $given_name,
                'surname'    => $surname,
                'gender'     => $gender[0],
                'lang'       => $lang,
                'email'      => strtolower(str_replace(' ', '', $email)),
                'born_on'    => $faker->dateTimeBetween('80 years ago', '30 years ago'),
                'dead_on'    => null,
            ];
        }

        DB::table('politicians')->insert($data);
    }
}

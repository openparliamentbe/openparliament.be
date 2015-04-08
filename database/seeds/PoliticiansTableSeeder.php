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
        $fakerFr = Faker::create('fr_FR');
        $fakerNl = Faker::create('nl_BE');

        // Seed the generators so that they always produce the same fake data.
        $fakerFr->seed(2015);
        $fakerNl->seed(2015);

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

        foreach (range(1, 90) as $index) {
            $gender     = $fakerNl->randomElement(['male', 'female']);
            $given_name = $fakerNl->firstname($gender);
            $surname    = $fakerNl->lastname;

            $email = "{$given_name}.{$surname}@example.dev";

            $data[] = [
                'party_id'   => $fakerNl->numberBetween(1, 5),
                'given_name' => $given_name,
                'surname'    => $surname,
                'gender'     => $gender[0],
                'lang'       => 'nl',
                'email'      => strtolower(str_replace(' ', '', $email)),
                'born_on'    => $fakerNl->dateTimeBetween('80 years ago', '30 years ago'),
                'dead_on'    => null,
            ];
        }

        foreach (range(1, 57) as $index) {
            $gender     = $fakerFr->randomElement(['male', 'female']);
            $given_name = $fakerFr->firstname($gender);
            $surname    = $fakerFr->lastname;

            $email = "{$given_name}.{$surname}@example.dev";

            $data[] = [
                'party_id'   => $fakerFr->numberBetween(1, 5),
                'given_name' => $given_name,
                'surname'    => $surname,
                'gender'     => $gender[0],
                'lang'       => 'fr',
                'email'      => strtolower(str_replace(' ', '', $email)),
                'born_on'    => $fakerFr->dateTimeBetween('80 years ago', '30 years ago'),
                'dead_on'    => null,
            ];
        }

        DB::table('politicians')->insert($data);
    }
}

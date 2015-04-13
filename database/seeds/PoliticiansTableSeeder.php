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
        $faker_de = Faker::create('de_DE');
        $faker_fr = Faker::create('fr_BE');
        $faker_nl = Faker::create('nl_BE');

        // Seed the generators so that they always produce the same fake data.
        $faker_de->seed(2015);
        $faker_fr->seed(2015);
        $faker_nl->seed(2015);

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
        foreach (range(4, 500) as $index) {

            $lang = 'nl';
            if ($index > 300) $lang = 'fr';
            if ($index > 480) $lang = 'de';

            $faker = ${'faker_'.$lang};

            $gender     = $faker->randomElement(['male', 'female']);
            $given_name = $faker->firstname($gender);
            $surname    = $faker->lastname;

            $data[] = [
                'party_id'   => $faker->numberBetween(1, 5),
                'given_name' => $given_name,
                'surname'    => $surname,
                'gender'     => $gender[0],
                'lang'       => $lang,
                'email'      => $this->generateEmail($given_name, $surname, $faker),
                'born_on'    => $faker->dateTimeBetween('80 years ago', '30 years ago'),
                'dead_on'    => null,
            ];
        }

        DB::table('politicians')->insert($data);
    }

    /**
     * Generate an e-mail address with the given identity.
     *
     * @param  string          $given_name
     * @param  string          $surname
     * @param  \Faker\Factory  $faker
     * @return string
     */
    protected function generateEmail($given_name, $surname, $faker)
    {
        $email = $given_name.'.'.$surname.'@'.$faker->domainName;

        $email = $faker->toAscii($email);

        return strtolower(str_replace(' ', '', $email));
    }
}

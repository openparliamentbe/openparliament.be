<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Seed the ‘documents’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $faker = Faker::create('fr_FR');

        // Seed the generators so that they always produce the same fake data.
        $faker->seed(2015);

        $data = [];

        // Initialize an array of increments, one for each dossier. This will
        // be used to keep track of the document numbers that are already used.
        $increments = array_fill(0, 250, 1);

        foreach (range(1, 1000) as $index) {
            $dossierId     = $faker->numberBetween(1, 250);
            $dossierNumber = str_pad($dossierId, 4, '0', STR_PAD_LEFT);
            $number        = str_pad($increments[$dossierId - 1], 3, '0', STR_PAD_LEFT);

            $increments[$dossierId - 1]++;

            $data[] = [
                'dossier_id' => $dossierId,
                'number' => '54K'.$dossierNumber.$number,
                'submitted_on' => $faker->dateTimeBetween('1 year ago', '11 months ago'),
                'distributed_on' => $faker->dateTimeBetween('10 months ago', '9 months ago'),
            ];
        }

        DB::table('documents')->insert($data);
    }
}

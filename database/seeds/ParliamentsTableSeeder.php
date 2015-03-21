<?php

use Illuminate\Database\Seeder;

/**
 * Seed the ‘̛̛parliaments’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class ParliamentsTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $data  = [
            [
                'id'      => 'k',
                'name_en' => 'Chamber of Representatives',
                'name_fr' => 'Chambre des représentants',
                'name_nl' => 'Kamer van Volksvertegenwoordigers',
            ],
            [
                'id'      => 's',
                'name_en' => 'Senate',
                'name_fr' => 'Sénat',
                'name_nl' => 'Senaat',
            ],
        ];

        DB::table('parliaments')->insert($data);
    }
}

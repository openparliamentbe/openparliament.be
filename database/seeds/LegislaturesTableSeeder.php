<?php

use Illuminate\Database\Seeder;

/**
 * Seed the ‘legislatures’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class LegislaturesTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $data  = [
            // Legislatures for the Chamber.
            [
                'id'            => '54k',
                'parliament_id' => 'k',
                'started_on'    => '2014-06-19',
                'ended_on'      => null,
            ],
            [
                'id'            => '53k',
                'parliament_id' => 'k',
                'started_on'    => '2010-07-06',
                'ended_on'      => '2014-04-28',
            ],
            // Legislatures for the Senate.
            [
                'id'            => '6s',
                'parliament_id' => 's',
                'started_on'    => '2014-07-03',
                'ended_on'      => null,
            ],
            [
                'id'            => '5s',
                'parliament_id' => 's',
                'started_on'    => '2010-07-06',
                'ended_on'      => '2014-04-24',
            ],
        ];

        DB::table('legislatures')->insert($data);
    }
}

<?php

use Illuminate\Database\Seeder;

/**
 * Seed the ‘sessions’ table.
 *
 * @author Michaël Lecerf <michael@estsurinter.net>
 */
class SessionsTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        $data  = [
            // Sessions for the 53rd legislature of the Chamber.
            [
                'legislature_id' => '53k',
                'started_on'     => '2010-07-06',
                'ended_on'       => '2010-10-11',
                'extraordinary'  => true,
            ],
            [
                'legislature_id' => '53k',
                'started_on'     => '2010-10-12',
                'ended_on'       => '2011-10-10',
                'extraordinary'  => false,
            ],
            [
                'legislature_id' => '53k',
                'started_on'     => '2011-10-11',
                'ended_on'       => '2012-10-08',
                'extraordinary'  => false,
            ],
            [
                'legislature_id' => '53k',
                'started_on'     => '2012-10-09',
                'ended_on'       => '2013-10-07',
                'extraordinary'  => false,
            ],
            [
                'legislature_id' => '53k',
                'started_on'     => '2013-10-08',
                'ended_on'       => '2014-04-28',
                'extraordinary'  => false,
            ],
            // Sessions for the 54th legislature of the Chamber.
            [
                'legislature_id' => '54k',
                'started_on'     => '2014-06-19',
                'ended_on'       => '2014-10-13',
                'extraordinary'  => true,
            ],
            [
                'legislature_id' => '54k',
                'started_on'     => '2014-10-14',
                'ended_on'       => null,
                'extraordinary'  => false,
            ],
            // TODO: add data for Senate.
        ];

        DB::table('sessions')->insert($data);
    }
}

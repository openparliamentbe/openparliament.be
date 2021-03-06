<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('ParliamentsTableSeeder');
        $this->call('LegislaturesTableSeeder');
        $this->call('SessionsTableSeeder');
        $this->call('DossiersTableSeeder');
        $this->call('DocumentsTableSeeder');
        $this->call('PartiesTableSeeder');
        $this->call('PoliticiansTableSeeder');
        $this->call('MandatesTableSeeder');
    }
}

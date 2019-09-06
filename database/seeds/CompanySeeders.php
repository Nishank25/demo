<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class CompanySeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'NeoSoft LLP',
                'location' => 'Hinjewadi phase 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'NeoSoft PVT LTD',
                'location' => 'Dadar mumbai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}

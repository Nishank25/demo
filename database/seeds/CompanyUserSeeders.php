<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class CompanyUserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_id = \App\Models\Role::where('name','Company User')->select('id')->first();
        $company_id1 = \App\Models\Company::where('name','NeoSoft LLP')->select('id')->first();
        $company_id2 = \App\Models\Company::where('name','NeoSoft PVT LTD')->select('id')->first();
        DB::table('users')->insert([
            [
                'name' => 'Normal user',
                'details' => 'Owner',
                'role_id' => $role_id->id,
                'company_id' => $company_id1->id,
                'email' => 'normaluser@gmail.com',
                'password' => bcrypt('normaluser'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'Normal user 2',
                'details' => 'Sub user',
                'role_id' => $role_id->id,
                'company_id' => $company_id2->id,
                'email' => 'normaluser2@gmail.com',
                'password' => bcrypt('normaluser2'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class CompanyOwnerSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_id = \App\Models\Role::where('name','Company Owner')->select('id')->first();
        $company_id1 = \App\Models\Company::where('name','NeoSoft LLP')->select('id')->first();
        $company_id2 = \App\Models\Company::where('name','NeoSoft PVT LTD')->select('id')->first();
        DB::table('users')->insert([
            [
                'name' => 'Owner',
                'details' => 'PHP Laravel developer',
                'role_id' => $role_id->id,
                'company_id' => $company_id1->id,
                'email' => 'owner@gmail.com',
                'password' => bcrypt('owner'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'Owner 2',
                'details' => 'PHP Laravel developer',
                'role_id' => $role_id->id,
                'company_id' => $company_id2->id,
                'email' => 'owner2@gmail.com',
                'password' => bcrypt('owner2'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}

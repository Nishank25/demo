<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyId1 = \App\Models\Company::where('name','NeoSoft LLP')->select('id')->first();
        $companyId2 = \App\Models\Company::where('name','NeoSoft PVT LTD')->select('id')->first();
        DB::table('products')->insert([
            [
                'name' => 'TV',
                'price' => '30000',
	            'quantity' => '10',
                'company_id' => $companyId1->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'Table',
                'price' => '5000',
		        'quantity' => '10',
                'company_id' => $companyId2->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}

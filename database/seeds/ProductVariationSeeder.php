<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productId1 = \App\Models\Product::where('name','TV')->select('id')->first();
        $productId2 = \App\Models\Product::where('name','Table')->select('id')->first();
        $variations1 = \App\Models\Variation::where('name','Size')->select('id')->first();
        $variations2 = \App\Models\Variation::where('name','Colour')->select('id')->first();
        DB::table('product_variation')->insert([
            [
                'variation_values' => 'S, L, M, XL, XXL',
                'variation_id' => $variations1->id,
                'product_id' => $productId1->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'variation_values' => 'Red, Green, Blue',
                'variation_id' => $variations2->id,
                'product_id' => $productId1->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
	        [
		        'variation_values' => 'Small, Medium, Large',
		        'variation_id' => $variations1->id,
		        'product_id' => $productId2->id,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ],[
		        'variation_values' => 'Black',
		        'variation_id' => $variations2->id,
		        'product_id' => $productId2->id,
		        'created_at' => Carbon::now(),
		        'updated_at' => Carbon::now(),
	        ]
        ]);
    }
}

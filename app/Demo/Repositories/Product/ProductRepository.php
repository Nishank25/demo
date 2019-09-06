<?php
/**
 * Created by PhpStorm.
 * User: neosoft
 * Date: 2/7/19
 * Time: 5:50 PM
 */

namespace App\Demo\Repositories\Product;


use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\Auth;
use function Psy\debug;

class ProductRepository implements ProductInterface
{
    public function getProductDetails($productId)
    {
	    $products = array();
        try {
            $products[] = Product::where('id',$productId)->with('productVariation','productVariation.variation')->first();
        } Catch(\Exception $ex) {
            $products = array();
        }
        return $products;
    }
	public function getAllDetails()
	{
		$products = NULL;
		try {
			$products = Product::with('productVariation','productVariation.variation')->get();
		} Catch(\Exception $ex) {
			$products = NULL;
		}
		return $products;
	}

    public function createProduct($request)
    {
        $user = Auth::user();
    	$status = FALSE;
	    try{
		    $product = new Product();
		    $product->name = $request->name;
		    $product->price = $request->price;
		    $product->quantity = $request->quantity;
		    $product->company_id = $request->company_id;
		    $product->created_by = $user->id;
		    $product->save();
		    $productId =  $product->id;
		    $status = TRUE;
		    if(isset($productId) && (!empty($productId))) {
		    	if(isset($request->variation) && (!empty($request->variation))) {
				    foreach ($request->variation as $variation) {
						$newProductVariation = new ProductVariation();
					    $newProductVariation->variation_id = $variation['id'];
					    $newProductVariation->product_id = $productId;
					    $newProductVariation->variation_values = $variation['value'];
					    $newProductVariation->save();
				    }
			    }
		    }

	    }catch (\Exception $exception){
		    $status = FALSE;
	    }
	    return $status;
    }

	public function editProduct($request)
	{
	    $user = Auth::user();
		$status = FALSE;
		try{
			$product = Product::where('id', $request->product_id)->first();
			$product->name = $request->name;
			$product->price = $request->price;
			$product->quantity = $request->quantity;
			$product->company_id = $request->company_id;
			$product->updated_by = $user->id;
			$product->save();
			$productId =  $product->id;
			$status = TRUE;
			if(isset($productId) && (!empty($productId))) {
				ProductVariation::where('product_id', $productId)->forceDelete();
				if(isset($request->variation) && (!empty($request->variation))) {
					foreach ($request->variation as $variation) {
						$newProductVariation = new ProductVariation();
						$newProductVariation->variation_id = $variation['id'];
						$newProductVariation->product_id = $productId;
						$newProductVariation->variation_values = $variation['value'];
						$newProductVariation->save();
					}
				}
			}

		}catch (\Exception $exception){
			$status = FALSE;
		}
		return $status;
	}

	public function deleteProduct($request)
	{
		$status = FALSE;
		try{
			Product::where('id', $request->product_id)->delete();
			ProductVariation::where('product_id', $request->product_id)->delete();
			$status = TRUE;
		}catch (\Exception $exception){
			$status = FALSE;
		}
		return $status;
	}

	public function searchProduct($request) {
		$productArray = array();
		try{
			$search = $request->search_query;
			$productIdArray = array();
			$productSearch = Product::where('name','LIKE',"%{$search}%")->pluck('id');
			$productVariationSearch = ProductVariation::select('product_id as id')->where('variation_values','LIKE',"%{$search}%")->pluck('id');

			if(isset($productSearch) && (!empty($productSearch))) {
				$ids = $productSearch->toArray();
			}
			if(isset($productVariationSearch) && (!empty($productVariationSearch))) {
				$variationids = $productVariationSearch->toArray();
				$ids = array_merge($ids,$variationids);
			}
			if(isset($ids) && (!empty($ids))) {
				$ids = array_unique($ids);
				foreach ($ids as $id) {
					$productArray[] = Product::where('id',$id)->with('productVariation','productVariation.variation')->first();
				}
			}
		}catch (\Exception $exception){
			$productArray = array();
		}
		return $productArray;
	}

}
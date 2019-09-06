<?php

namespace App\Demo\Transformers\Product;

class ProductTransformer
{
    public function getProductDetails($details) {
	    $response['status'] = FALSE;
	    $response['message'] = 'No record found for the respective product';
	    $product = array();
	    if(isset($details) && (!empty($details))) {
		    foreach($details as $record) {
			    $variation = array();
			    foreach ($record->productVariation as $v) {
				    $variationValue = $v->variation_values;
				    $variationId = $v->variation_id;
				    $variationName = $v->variation->name;
				    $variation[] = array('id' => $variationId, 'name' =>$variationName, 'value' =>$variationValue );
			    }

			    $product[] = array(
				    'name' => $record->name,
				    'product_id' => $record->id,
				    'quantity' => $record->quantity,
				    'price' => $record->price,
				    'company_id' => $record->company_id,
				    'variation' => $variation
			    );
		    }
	    }
	    if(isset($product) && (!empty($product))) {
		    $response['status'] = TRUE;
		    $response['message'] = "";
		    $response['data'] = $product;
	    }
	    return response()->json($response,200);
    }


	public function createProduct($status) {
		$response['status'] = FALSE;
		$response['message'] = 'Error while creating product.';
		if(isset($status) && (!empty($status))) {
			$response['status'] = TRUE;
			$response['message'] = 'Product created successfully.';
		}
		return response()->json($response,200);
	}

	public function editProduct($status) {
		$response['status'] = FALSE;
		$response['message'] = 'Error while updating product.';
		if(isset($status) && (!empty($status))) {
			$response['status'] = TRUE;
			$response['message'] = 'Product updated successfully.';
		}
		return response()->json($response,200);
	}

	public function deleteProduct($status) {
		$response['status'] = FALSE;
		$response['message'] = 'Error while deleting product.';
		if(isset($status) && (!empty($status))) {
			$response['status'] = TRUE;
			$response['message'] = 'Product deleted successfully.';
		}
		return response()->json($response,200);
	}

	public function searchProduct($details) {
		$response['status'] = FALSE;
		$response['message'] = 'No record found for the respective search';
		$product = array();
		if(isset($details) && (!empty($details))) {
			foreach($details as $record) {
				$variation = array();
				foreach ($record->productVariation as $v) {
					$variationValue = $v->variation_values;
					$variationId = $v->variation_id;
					$variationName = $v->variation->name;
					$variation[] = array('id' => $variationId, 'name' =>$variationName, 'value' =>$variationValue );
				}

				$product[] = array(
					'name' => $record->name,
					'product_id' => $record->id,
					'quantity' => $record->quantity,
					'price' => $record->price,
					'company_id' => $record->company_id,
					'variation' => $variation
				);
			}
		}
		if(isset($product) && (!empty($product))) {
			$response['status'] = TRUE;
			$response['message'] = "";
			$response['data'] = $product;
		}
		return response()->json($response,200);
	}
}
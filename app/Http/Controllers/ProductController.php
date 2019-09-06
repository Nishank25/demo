<?php

namespace App\Http\Controllers;

use App\Demo\Repositories\Product\ProductInterface;
use App\Demo\Transformers\Product\ProductTransformer;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductSearchRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll(ProductTransformer $productTransformer, ProductInterface $productInterface) {
        return $productTransformer->getProductDetails($productInterface->getAllDetails());
    }

	public function productDetails(ProductTransformer $productTransformer, ProductInterface $productInterface, Request $request) {
		return $productTransformer->getProductDetails($productInterface->getProductDetails($request->product_id));
	}

    public function create(ProductTransformer $productTransformer, ProductInterface $productInterface, ProductCreateRequest $request){
        return $productTransformer->createProduct($productInterface->createProduct($request));
    }

	public function edit(ProductTransformer $productTransformer, ProductInterface $productInterface, ProductEditRequest $request){
    	return $productTransformer->editProduct($productInterface->editProduct($request));
	}

	public function delete(ProductTransformer $productTransformer, ProductInterface $productInterface, ProductDeleteRequest $request){
		return $productTransformer->deleteProduct($productInterface->deleteProduct($request));
	}

	public function search(ProductTransformer $productTransformer, ProductInterface $productInterface, ProductSearchRequest $request){
		return $productTransformer->searchProduct($productInterface->searchProduct($request));
	}
}

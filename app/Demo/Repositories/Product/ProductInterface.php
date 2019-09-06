<?php

namespace App\Demo\Repositories\Product;


interface ProductInterface
{
	public function getAllDetails();
    public function getProductDetails($productId);
    public function createProduct($request);
	public function editProduct($request);
}
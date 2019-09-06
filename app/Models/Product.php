<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = ['name','price','company_id','created_by','updated_by'];

    public function productVariation()
    {
        return $this->hasMany('App\Models\ProductVariation', 'product_id','id');
    }
}

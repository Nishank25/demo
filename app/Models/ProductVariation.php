<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariation extends Model
{
	use SoftDeletes;

    protected $table = "product_variation";

    protected $fillable = ['name','price','variation_id','product_id'];

    public function Product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function Variation(){
        return $this->belongsTo('App\Models\Variation');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use SoftDeletes;

    protected $table = "variation";

    protected $fillable = ['name','update_by','created_by'];

    public function productVariation()
    {
        return $this->has('App\Models\ProductVariation');
    }
}

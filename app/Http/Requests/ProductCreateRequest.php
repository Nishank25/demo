<?php

namespace App\Http\Requests;

use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return policy(Product::class)->create($this->user()) ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'name' => 'required|string',
	        'price' => 'required',
	        'quantity' => 'required',
	        'company_id' => 'required'
        ];
    }
}

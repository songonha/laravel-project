<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_category_id' => ['bail', 'required', 'integer'],
            'name' => ['bail', 'required', 'min:4', 'max:255'],
            'description' => ['bail', 'required', 'min:6', 'max:255'],
            'quantity' => ['bail', 'required', 'integer', 'gt:0'],
            'input_price' => ['bail', 'required', 'integer', 'gt:0'],
            'price' => ['bail', 'required', 'integer', 'gte:price'],
            'images.*' => ['bail', 'required', 'image'],
        ];
    }
}

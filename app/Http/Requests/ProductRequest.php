<?php

namespace App\Http\Requests;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'product_category_id' => 'required|integer|exists:product_categories,id',
            'sku' => 'required|string|max:18|unique:products,sku',
            'ean' => 'required|string|max:13|unique:products,ean',
            'description' => 'nullable|string',
        ];
    }
}

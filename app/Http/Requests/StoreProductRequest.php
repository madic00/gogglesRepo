<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|max:4000',
            'image2' => 'required|image|max:4000',
            'image3' => 'required|image|max:4000',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'gender_id' => 'required|regex:/^[01]$/',
            'is_active' => 'regex:/^[01]$/',
            'featured' => 'regex:/^[01]$/',
        ];
    }
}

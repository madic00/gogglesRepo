<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name' => 'required|max:255|min:3|regex:/^[\pL\s\-]+$/u',
            'user_id' => 'required|exists:users,id',
            'phone' => ['required', 'regex:/^(\+[\d]{2,3}|0[\d]{2,3})[\d]{6,10}$/u'],
            'country' => 'required|string|min:3|max:255',
            'city' => 'required|string|min:3|max:255',
            // 'address' => 'required|min:10|max:255',
            'address' => ['required', 'regex:/^[\pL\s\-\d]{10,255}$/u'],
            'card_number' => 'required|string|regex:/^[\d]{16}$/',
            'cvv' => 'required|regex:/^[\d]{2,3}$/'
        ];
    }
}

<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|max:50',
            'descriptions' => 'nullable|max:400',
            'count' => 'required|numeric',
            'price' => 'required|numeric',
            'color' => ['nullable', Rule::in(['yellow', 'green', 'red'])],
            'size' => ['nullable', Rule::in(['small', 'large', 'middle'])],
            'state' => ['nullable', Rule::in(['new', 'secondHand', 'undefined'])],
            'category_id' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Product;
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
        return $this->user()->can('create', Product::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'type_id' => ['required', 'exists:App\Models\Type,id'],
            'brand_id' => ['required', 'exists:App\Models\Brand,id'],
            'country_id' => ['required', 'exists:App\Models\Country,id'],
            'category_id' => ['required', 'exists:App\Models\Category,id']
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Order;
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
        return $this->user()->can('store', Order::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => ['required', 'string', 'max:255'],
            'count' => ['required', 'integer'],
            'created_at' => ['required', 'date', 'date_format:d-m-Y'],
            'updated_at' => ['required', 'nullable|date', 'date_format:d-m-Y'],
            'user_id' => ['required', 'exists:App\Model\User,id'],
            'product_id' => ['required', 'exists:App\Model\Product,id'],
        ];
    }
}

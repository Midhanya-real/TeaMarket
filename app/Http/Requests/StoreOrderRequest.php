<?php

namespace App\Http\Requests;

use App\Models\Order;
use App\Resources\OrderResources\OrderStatuses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Order::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => ['required', new Enum(OrderStatuses::class)],
            'count' => ['required', 'integer'],
            'created_at' => ['required', 'date', 'date_format:d-m-Y'],
            'updated_at' => ['required', 'nullable|date', 'date_format:d-m-Y'],
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'product_id' => ['required', 'exists:App\Models\Product,id'],
        ];
    }
}

<?php

namespace App\Actions\Payments;


use Illuminate\Http\Request;

class PaymentBodyParser
{
    public function getDescription(Request $request): string
    {
        return "Заказ: №" . $request->id . " Наименование товара: " . $request->product . " Количество: " . $request->count;
    }
}

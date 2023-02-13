<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\PaymentService\PayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct(
        private PayService $service
    ){}

    public function create(Request $order)
    {
       $orderLink = $this->service->create($order);

       return redirect($orderLink->confirmation['confirmation_url']);
    }

}

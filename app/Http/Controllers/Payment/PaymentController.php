<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\PaymentGateway\PaymentServiceInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    /**
     * Start Service Container
     * payment called from the router
     * initiate the PaymentServiceInterface
     * pass the value and return the response
     * return response can be checkout() or anything depending on the situation
     */
    public function pay(Request $request, PaymentServiceInterface $paymentService)
    {
        $res = $paymentService->process($request);
        return $paymentService->checkout($res);
    }

    //end of service container
}

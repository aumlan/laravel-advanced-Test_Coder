<?php

namespace App\PaymentGateway;

use Illuminate\Http\Request;

class StripeAPI implements PaymentServiceInterface
{

    public function process(Request $request)
    {
        dd('stripe');
        // TODO: Implement process() method.
    }

    public function checkout($res)
    {
        // TODO: Implement checkout() method.
    }
}

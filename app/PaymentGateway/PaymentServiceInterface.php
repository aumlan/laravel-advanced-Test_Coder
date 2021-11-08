<?php

namespace App\PaymentGateway;

use Illuminate\Http\Request;

interface PaymentServiceInterface
{
    public function process(Request $request);
    public function checkout($res);
}

<?php

namespace App\PaymentGateway;

use Illuminate\Http\Request;

class PaypalAPI implements PaymentServiceInterface
{

    /**
     * PayPal Payment Gateway
     * By srmklive
     * https://srmklive.github.io/laravel-paypal/docs.html
     */
    public function process(Request $request)
    {
        dd('paypal');
        $products = [];
        $products['items'] = [
            ['name'    => 'Laravel Book',
                'price'   => 1200,
                'des'     => "Laravel Book for Advance Learning",
                'qty'     => 1 ]
        ];

        $products['invoice_id'] = uniqid();
        $products['invoice_description'] = "Order #{$products['invoice_id']} Billing";

        // redirect user after successful payment
        // should have this route in web.php

//        $products['return_url'] = route('success.pay');

        // redirect user if payment failed
        // should have this route in web.php

//        $products['cancel_url'] = route('failed.pay');

        $products['total'] = 1200;

        $paypal = new ExpressCheckout();

        return $paypal->setExpressCheckout($products);

    }

    public function checkout($res)
    {
        return redirect($res['paypal_link']);
    }
}

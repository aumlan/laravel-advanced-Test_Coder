<?php

namespace App\Providers;

use App\PaymentGateway\PaymentServiceInterface;
use App\PaymentGateway\PaypalAPI;
use App\PaymentGateway\StripeAPI;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

//        here the value comes from the request (if it is a button)
//        <button type="submit" class="btn btn-warning" name="pay_method" value="paypal" >
//                Proceed with PayPal
//        </button>

        $this->app->bind(PaymentServiceInterface::class, function($app){
             // from button request
//            $gateway = request()->pay_method;

            // from query request
            $gateway = request()->get('pay_method');

            if ($gateway === "paypal"){
                return new PaypalAPI();
            }elseif($gateway === "stripe"){
                return new StripeAPI();
            }

        });

//        end of service container

        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

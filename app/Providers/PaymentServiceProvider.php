<?php

namespace App\Providers;

use App\Services\PaymentService\YookassaApi;

use Illuminate\Support\ServiceProvider;
use YooKassa\Client;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(YookassaApi::class, function ($app) {
            return new YookassaApi(config('payment.yookassa'), $app->make(Client::class));
        });
    }

    public function provides()
    {
        return [YookassaApi::class];
    }
}

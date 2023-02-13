<?php

namespace App\Providers;

use App\Services\PaymentService\YookassaApi;
use Illuminate\Support\ServiceProvider;
use YooKassa\Model\Payment;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(YookassaApi::class);
    }

    public function provides()
    {
        return [YookassaApi::class];
    }
}

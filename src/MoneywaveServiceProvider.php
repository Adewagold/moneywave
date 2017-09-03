<?php

namespace adewagold\moneywave;

use Illuminate\Support\ServiceProvider;

class MoneywaveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Adewagold\Moneywave\Moneywave');
    }
}

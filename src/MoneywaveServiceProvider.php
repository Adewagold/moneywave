<?php

/*
 * This file is part of the Laravel Moneywave package.
 *
 * (c) Adewale Adeleye <adewagold@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
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

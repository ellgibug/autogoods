<?php

namespace ABCP\TecDoc;

use Illuminate\Support\ServiceProvider;

class TecDocServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/tecdoc.php', 'tecdoc'
        );

        $this->app->singleton('tecdoc', function () {

            return new TecDocFunctions($this->app['config']->get('tecdoc'));
        });
    }
}
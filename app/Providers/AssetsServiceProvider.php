<?php

namespace InterComm\Providers;

use Illuminate\Support\ServiceProvider;


class AssetsServiceProvider extends ServiceProvider
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
     
        // $this->app->register(\Intervention\Image\ImageServiceProvider::class);
        // $this->app->alias(        'Image' , 'Intervention\Image\Facades\Image');
    }
}

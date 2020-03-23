<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->make('view')->composer('page.index', 'App\Http\ViewComposers\ServicesComposer');
    }
}

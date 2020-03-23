<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AboutServiceProvider extends ServiceProvider
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->app->make('view')->composer('*', 'App\Http\ViewComposers\AboutComposer');
    }
}

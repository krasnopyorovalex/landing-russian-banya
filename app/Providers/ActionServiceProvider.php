<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('view')->composer('*', 'App\Http\ViewComposers\ActionComposer');
    }
}

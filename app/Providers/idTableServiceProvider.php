<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class idTableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path().'/Helpers/IdTable.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once app_path().'/Helpers/IdTable.php';
    }
}

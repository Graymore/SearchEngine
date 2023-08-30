<?php

namespace SearchEngine;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->commands([
            \SearchEngine\Shell::class
        ]);
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/search.php' => config_path('search.php'),
        ]);
    }
}
<?php

namespace SearchEngine;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/search.php' => config_path('search.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                \SearchEngine\Shell::class
            ]);
        }
    }
}
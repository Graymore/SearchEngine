<?php

namespace Graymore\SearchEngine;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->commands([
            Shell::class,
        ]);

        $this->publishes([
            __DIR__.'/config/search.php' => config_path('search.php'),
        ], 'search-config');
    }
}
<?php

namespace SearchEngine\Providers;

use Illuminate\Support\ServiceProvider;
use SearchEngine\SearchEngine;

class SearchServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/search.php' => config_path('search.php'),
        ]);
    }
}
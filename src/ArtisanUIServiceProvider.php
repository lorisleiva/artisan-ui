<?php

namespace Lorisleiva\ArtisanUI;

use Illuminate\Support\ServiceProvider;

class ArtisanUIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
            $this->commands([
                ArtisanUIInstallCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/artisan-ui.php', 'artisan-ui');

        $this->app->singleton(ArtisanUI::class);
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/artisan-ui.php' => config_path('artisan-ui.php'),
        ], ['config', 'artisan-ui-config']);
    }
}

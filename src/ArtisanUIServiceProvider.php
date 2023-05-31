<?php

namespace Lorisleiva\ArtisanUI;

use Illuminate\Foundation\Console\AboutCommand;
use Lorisleiva\ArtisanUI\Commands\ArtisanUIInstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ArtisanUIServiceProvider extends PackageServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        AboutCommand::add('Artisan UI', fn () => ['Version' => 'fork of Mánuel']);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('artisan-ui')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasRoute('web')
            ->hasCommand(ArtisanUIInstallCommand::class);
    }

    public function packageRegistered()
    {
        $this->app->singleton(ArtisanUI::class);
    }
}

<?php

namespace MoonlyDays\Crowdin;

use MoonlyDays\Crowdin\Commands\CrowdinCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CrowdinServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-crowdin')
            ->hasCommand(CrowdinCommand::class);
    }

    public function registeringPackage(): void
    {
        $this->app->singleton('crowdin', Crowdin::class);
    }
}

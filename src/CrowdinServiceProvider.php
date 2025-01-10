<?php

namespace MoonlyDays\Crowdin;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MoonlyDays\Crowdin\Commands\CrowdinCommand;

class CrowdinServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-crowdin')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_crowdin_table')
            ->hasCommand(CrowdinCommand::class);
    }
}

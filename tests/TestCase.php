<?php

namespace MoonlyDays\Crowdin\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use MoonlyDays\Crowdin\CrowdinServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'MoonlyDays\\Crowdin\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            CrowdinServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        config()->set('services.crowdin.project_id', '735755');
        config()->set('services.crowdin.key', 'b54e36f8f825d5f0591090c02e55df14f0030cda3b04e69d8e3632bf9f01f5fc225368efb1cccc81');

        /*
         foreach (\Illuminate\Support\Facades\File::allFiles(__DIR__ . '/database/migrations') as $migration) {
            (include $migration->getRealPath())->up();
         }
         */
    }
}

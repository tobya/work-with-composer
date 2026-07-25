<?php

namespace Tobya\WorkWithComposer;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Tobya\WorkWithComposer\Commands\WorkWithComposerCommand;

class WorkWithComposerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('work-with-composer')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_work_with_composer_table')
            ->hasCommand(WorkWithComposerCommand::class);
    }
}

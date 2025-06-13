<?php

namespace NietThijmen\LaravelRoles;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRolesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-roles')
            ->publishesServiceProvider('LaravelRolesServiceProvider')
            ->hasMigrations([
                'create_roles_table',
                'create_user_roles_table',
            ])
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->setName('roles:install')
                    ->setDescription('Install the Laravel Roles package')
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Installing Laravel Roles package...');
                    })
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('nietthijmen/laravel-roles')
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Laravel Roles package installed successfully!');
                    });
            });
    }
}

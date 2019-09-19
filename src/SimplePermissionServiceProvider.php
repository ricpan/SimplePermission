<?php

namespace Pancini\SimplePermission;

use Illuminate\Support\ServiceProvider;

class SimplePermissionServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pancini');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'pancini');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/simplepermission.php', 'simplepermission');

        // Register the service the package provides.
        $this->app->singleton('simplepermission', function ($app) {
            return new SimplePermission;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['simplepermission'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/simplepermission.php' => config_path('simplepermission.php'),
        ], 'simplepermission.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/pancini'),
        ], 'simplepermission.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/pancini'),
        ], 'simplepermission.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/pancini'),
        ], 'simplepermission.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}

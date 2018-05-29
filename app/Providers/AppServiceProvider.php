<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $site_name = strtoupper(getenv('SITE_CODE'));
        if (empty($site_name)) {
            $site_name = "BACKEND";

        }

        $site_path = app_path() . '/Sites/' . $site_name;

        $namespace = "\\App\\Sites\\{$site_name}\\Controllers";

        if (file_exists($site_path)) {
            $this->loadMigrationsFrom($site_path . '/Migrations');
            $this->loadViewsFrom($site_path . '/Views', strtolower($site_name));

            $this->loadTranslationsFrom($site_path . '/Translations', strtolower($site_name));
            \Route::namespace($namespace)->middleware('web')->group($site_path . '/routes.php');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

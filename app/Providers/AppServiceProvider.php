<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $files = File::allFiles(app_path('Services'));

        foreach ($files as $file) {

            $file = str_replace('.php', '', $file->getRelativePathname());
            $class = 'App\Services\\' . $file;

            $this->app->bind($class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

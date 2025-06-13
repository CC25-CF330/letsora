<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Hapus wrapping JSON agar response rapi
        JsonResource::withoutWrapping();

        // Paksa semua URL menggunakan HTTPS di environment production
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}

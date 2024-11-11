<?php

namespace App\Providers;

use App\Contracts\EntryCode;
use App\Contracts\TokenGenerator;
use App\Services\RandomEntryCodeGenerator;
use App\Services\RandomTokenGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TokenGenerator::class, RandomTokenGenerator::class);
        $this->app->bind(EntryCode::class, RandomEntryCodeGenerator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\BaseRepository;
use App\Interfaces\BaseInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

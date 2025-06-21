<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\BaseRepository;
use App\Interfaces\BaseInterface;
use App\Interfaces\Contact\ContactInterface;
use App\Repositories\Contact\ContactRepository;
use App\Interfaces\User\UserInterface;
use App\Repositories\User\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(ContactInterface::class, ContactRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

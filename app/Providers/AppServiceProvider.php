<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('App\Interfaces\ConferenceInterface', 'App\Repositories\ConferenceRepository');
        $this->app->bind('App\Interfaces\HallInterface', 'App\Repositories\HallRepository');
        $this->app->bind('App\Interfaces\SeatInterface', 'App\Repositories\SeatRepository');
        $this->app->bind('App\Interfaces\SessionInterface', 'App\Repositories\SessionRepository');
        $this->app->bind('App\Interfaces\SpeakerInterface', 'App\Repositories\SpeakerRepository');
        $this->app->bind('App\Interfaces\TicketInterface', 'App\Repositories\TicketRepository');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
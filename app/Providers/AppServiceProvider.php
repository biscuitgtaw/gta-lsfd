<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\modals\cIncident;
use App\View\Components\elements\manageIncidents;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('modals.create_incident', cIncident::class);
        Blade::component('elements.incident_manager', manageIncidents::class);
    }
}

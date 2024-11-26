<?php

namespace App\Providers;

use App\View\Composers\ChangeContactComposer;
use App\View\Composers\CityComposer;
use App\View\Composers\MenuComposer;
use App\View\Composers\MenuTopComposer;
use App\View\Composers\PartnersComposer;
use App\View\Composers\Service5Composer;
use App\View\Composers\SliderServicesAndTrainingComposer;
use App\View\Composers\Training5Composer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer(['modules.module_1'], Service5Composer::class);
        View::composer(['modules.module_2'], Training5Composer::class);
        View::composer(['modules.module_5'], SliderServicesAndTrainingComposer::class);
        View::composer(['modules.module_6'], PartnersComposer::class);
        View::composer(['modules.module_6'], PartnersComposer::class);
        View::composer('include.connect._change_contacts', ChangeContactComposer::class);
        View::composer(['include.blocks.cities.top_cities', 'pages.contacts'], CityComposer::class);
        View::composer(['include.menu.menu_top','templates.axeld.footer'], MenuComposer::class);


    }
}

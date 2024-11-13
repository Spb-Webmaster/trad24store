<?php

namespace App\Providers;





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






    }
}

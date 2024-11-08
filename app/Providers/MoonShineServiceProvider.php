<?php

declare(strict_types=1);

namespace App\Providers;


use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\TrainingResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),
            MenuGroup::make(static fn() => __('Страницы'), [


                MenuItem::make(
                    static fn() => __('Материалы'),
                    new PageResource()
                )->icon('heroicons.outline.bars-3'),

                MenuItem::make(
                    static fn() => __('Обучение'),
                    new TrainingResource()
                )->icon('heroicons.outline.building-office'),

                MenuItem::make(
                    static fn() => __('Услуги'),
                    new ServiceResource()
                )->icon('heroicons.outline.building-office-2'),


            ]),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}

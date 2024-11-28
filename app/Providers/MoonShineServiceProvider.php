<?php

declare(strict_types=1);

namespace App\Providers;


use App\Models\MediatorCategory;
use App\Models\MediatorProduct;
use App\MoonShine\Pages\ChangeContactPage;
use App\MoonShine\Pages\DiplomPage;
use App\MoonShine\Pages\IndexPage;
use App\MoonShine\Pages\ServicePage;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Pages\TrainingPage;

use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\ContactResource;
use App\MoonShine\Resources\DiplomResource;
use App\MoonShine\Resources\MediatorCategoryResource;
use App\MoonShine\Resources\MediatorProductResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\PartnerResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\TimeTableCityResource;
use App\MoonShine\Resources\TimeTableLessonResource;
use App\MoonShine\Resources\TimeTableMonthResource;
use App\MoonShine\Resources\TrainingResource;
use App\MoonShine\Resources\UserCityResource;
use App\MoonShine\Resources\UserLanguageResource;
use App\MoonShine\Resources\UserListResource;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\UserTypeResource;
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
                    static fn() => __('Пользователи'),
                    new UserResource()
                )->icon('heroicons.outline.user-group'),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),
            MenuGroup::make(static fn() => __('Страницы'), [


                MenuItem::make(
                    static fn() => __('Главная стрнаица сайта'),
                    new IndexPage()
                )->icon('heroicons.outline.bars-3'),
                MenuItem::make(
                    static fn() => __('Страницы'),
                    new PageResource()
                )->icon('heroicons.outline.bars-3'),
                MenuGroup::make(static fn() => __('О нас'), [

                    MenuItem::make(
                        static fn() => __('Категории'),
                        new MediatorCategoryResource()
                    )->icon('heroicons.outline.bars-3'),
                    MenuItem::make(
                    static fn() => __('Материалы'),
                    new MediatorProductResource()
                )->icon('heroicons.outline.book-open'),
                ]),
                MenuGroup::make(static fn() => __('Обучение'), [

                    MenuItem::make(
                        static fn() => __('Главная'),
                        new TrainingPage()
                    )->icon('heroicons.outline.bars-3'),
                    MenuItem::make(
                    static fn() => __('Обучение'),
                    new TrainingResource()
                )->icon('heroicons.outline.book-open'),
                ]),
                MenuGroup::make(static fn() => __('Услуги'), [
                    MenuItem::make(
                        static fn() => __('Главная'),
                        new ServicePage()
                    )->icon('heroicons.outline.bars-3'),
                MenuItem::make(
                    static fn() => __('Услуги'),
                    new ServiceResource()
                )->icon('heroicons.outline.bolt'),
                ]),

                MenuItem::make(
                    static fn() => __('Города'),
                    new CityResource()
                )->icon('heroicons.outline.building-office-2'),
                MenuItem::make(
                    static fn() => __('Контакты'),
                    new ContactResource()
                )->icon('heroicons.outline.map-pin'),

            ]),

            MenuGroup::make(static fn() => __('Настройки'), [


                MenuItem::make(
                    static fn() => __('Фронт'),
                    new SettingPage()
                )->icon('heroicons.adjustments-vertical'),
               MenuItem::make(
                    static fn() => __('Режимы показа'),
                    new ChangeContactPage()
                )->icon('heroicons.cog'),

            ]),

            MenuGroup::make(static fn() => __('Ресурсы'), [
                MenuItem::make(
                    static fn() => __('Парнтеры'),
                    new PartnerResource()
                )->icon('heroicons.outline.hand-thumb-up'),
                MenuItem::make(
                    static fn() => __('Поиск диплома'),
                    new DiplomPage()
                )->icon('heroicons.outline.academic-cap'),
                MenuItem::make(
                    static fn() => __('Дипломы'),
                    new DiplomResource()
                )->icon('heroicons.outline.academic-cap'),
                MenuGroup::make(static fn() => __('Расписание'), [
                    MenuItem::make(
                        static fn() => __('Города'),
                        new TimeTableCityResource()
                    )->icon('heroicons.outline.building-office-2'),
     /*               MenuItem::make(
                        static fn() => __('Месяцы'),
                        new TimeTableMonthResource()
                    )->icon('heroicons.outline.building-office-2'),
                    MenuItem::make(
                        static fn() => __('Типы медиаторов'),
                        new UserTypeResource()
                    )->icon('heroicons.outline.document'),
                        MenuItem::make(
                        static fn() => __('Выды медиации'),
                        new UserListResource()
                    )->icon('heroicons.outline.document'),
                    MenuItem::make(
                        static fn() => __('Языки медиации'),
                        new UserLanguageResource()
                    )->icon('heroicons.outline.document'),*/
                    MenuItem::make(
                        static fn() => __('Города  медиации'),
                        new UserCityResource()
                    )->icon('heroicons.outline.document'),
                    MenuItem::make(
                        static fn() => __('Предметы'),
                        new TimeTableLessonResource()
                    )->icon('heroicons.outline.document'),

                    ]),
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

<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserMediator;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<UserMediator>
 */
class UserMediatorResource extends ModelResource
{
    protected string $model = UserMediator::class;

    protected string $title = 'Все медиации';

    protected string $column = 'title';


    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make(),

            BelongsTo::make('Пользователь', 'user', resource: new UserResource())->searchable(),
        ];
    }


    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Text::make('Заголовок', 'title')->required(),

            Switcher::make('Семейная', 'sem'),

            Switcher::make('Уголовная', 'ugo'),

            Switcher::make('Гражданская', 'gra'),

            Switcher::make('Ювенальная', 'uve'),

            Switcher::make('Корпоративная', 'kor'),

            Switcher::make('Трудовые споры', 'tru'),

            Switcher::make('Банковские споры', 'ban'),

            Switcher::make('Публ.', 'published')->updateOnPreview(),





        ];
    }

    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([


                                Collapse::make('Заголовок', [

                                    Text::make('Заголовок (Автоматическое поле)', 'title')->readonly(),
                                    BelongsTo::make('Пользователь', 'user', resource: new UserResource())->searchable(),

                                ]),

                                Collapse::make('Дата отчета', [

                                    Date::make('Укажите дату', 'created_at')->hint('Записывается месяц проведенных медиаций')


                                ]),




                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Отчет о медиации', [
                                    Number::make('Семейная', 'sem')
                                    ->min(0)
                                    ->max(50)
                                    ->step(1)->default(0),

                                    Number::make('Уголовная', 'ugo')
                                    ->min(0)
                                    ->max(50)
                                    ->step(1)->default(0),

                                    Number::make('Гражданская', 'gra')
                                    ->min(0)
                                    ->max(50)
                                    ->step(1)->default(0),

                                    Number::make('Ювенальная', 'uve')
                                    ->min(0)
                                    ->max(50)
                                    ->step(1)->default(0),

                                    Number::make('Корпоративная', 'kor')
                                    ->min(0)
                                    ->max(50)
                                    ->step(1)->default(0),

                                    Number::make('Трудовые споры', 'tru')
                                    ->min(0)
                                    ->max(50)
                                    ->step(1)->default(0),

                                    Number::make('Банковские споры', 'ban')
                                    ->min(0)
                                    ->max(50)
                                    ->step(1)->default(0),



                                ]),

                                Collapse::make('Публикация', [

                                    Switcher::make('Публикация', 'published')->default(0),

                                ]),

                            ])
                                ->columnSpan(6)

                        ]),


                    ]),



                ]),


            ]),
        ];


    }


    public function rules(Model $item): array
    {
        return [

        ];
    }


    public function import(): ?ImportHandler
    {
        return null;
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }


    public function treeKey(): ?string
    {
        return null;
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}

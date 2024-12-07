<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\TimetableCity;
use App\MoonShine\Enum\StatusEmun;
use App\MoonShine\Fields\Months;
use Illuminate\Database\Eloquent\Model;
use App\Models\TimeTableLesson;

use MoonShine\Components\Badge;
use MoonShine\Components\Link;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Relationships\BelongsToMany;

use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<TimeTableLesson>
 */
class TimeTableLessonResource extends ModelResource
{
    protected string $model = TimeTableLesson::class;

    protected string $title = 'Предметы обучения';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

             Text::make('Название', 'title'),

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

            Text::make(__('Заголовок'), 'title'),


            BelongsToMany::make('Месяцы', 'timetable_month', 'title', resource: new TimeTableMonthResource())   ->inLine(
                separator: '<br>',
                badge: fn($model, $value) => Badge::make($value, 'success'),

            ),
            BelongsToMany::make('Город', 'timetable_city', 'title', resource: new TimeTableCityResource() )   ->inLine(
                separator: '<br>',
                badge: fn($model, $value) => Badge::make($value, 'success'),

            ),
          Switcher::make('Дата', 'date'),




            Switcher::make('Время', 'time'),
            Switcher::make('Цена', 'price'),
            Switcher::make('Часы', 'a_hour'),
            Switcher::make('Публикация', 'published')->updateOnPreview(),



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


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique(),




]),

                            ])->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle')->unescape(),
                                    Text::make('Мета тэг (description) ', 'description')->unescape(),
                                    Text::make('Мета тэг (keywords) ', 'keywords')->unescape(),
                                    Switcher::make('Публикация', 'published')->default(1),
                                ]),
                            ])->columnSpan(6),

                        ]),
                        Grid::make([
                            Column::make([
                                Collapse::make('Проведение по месяцам', [

                                    BelongsToMany::make('Месяц', 'timetable_month', 'title', resource: new TimeTableMonthResource() )->selectMode(),

                                ]),
                            ])  ->columnSpan(6),
                            Column::make([
                                Collapse::make('Проведение в городах', [

                                    BelongsToMany::make('Город', 'timetable_city', 'title', resource: new TimeTableCityResource() )->selectMode(),

                                ]),
                            ])  ->columnSpan(6),

                        ]),

                        Grid::make([
                            Column::make([
                                Collapse::make('Детали', [



                                    Text::make('Дата проведения', 'date'),
                                    Textarea::make('Примечание', 'message'),
                                    Text::make('Время проведения', 'time'),
                                    Switcher::make('Цена от ...', 'price_prefix')->default(0),

                                    Number::make('Стоимость', 'price'),
                                    Text::make('Академ.ч.', 'a_hour'),

                                ]),
                            ])  ->columnSpan(12)

                        ]),

                        Grid::make([
                            Column::make([
                                Collapse::make('Описани в модальном окне', [


                                    Divider::make(),

                                    TinyMce::make('Описание', 'text'),

                                ]),
                            ])  ->columnSpan(12)

                        ]),

                    ]),



                ]),


            ]),
        ];


    }


    public function rules(Model $item): array
    {
        return [
            'metatitle' => 'max:2024',
            'description' => 'max:2024',
            'keywords' => 'max:2024',
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

<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\TimeTableLesson;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
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

            Text::make('Название', 'title')
                ->useOnImport()
                ->showOnExport(),
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
            Text::make(__('Месяц'), 'month'),
            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y"),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Title', 'metatitle'),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),


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



                                Text::make(__('Подзаголовок'), 'subtitle'),

                                   Select::make('Месяцы', 'month')
                                   ->options([
                                       'january' => 'Январь',
                                       'february' => 'Февраль',
                                       'march' => 'Март',
                                       'april' => 'Апрель',
                                       'may' => 'Май',
                                       'june' => 'Июнь',
                                       'july' => 'Июль',
                                       'august' => 'Август',
                                       'september' => 'Сентябрь',
                                       'october' => 'Октябрь',
                                       'november' => 'Ноябрь',
                                       'december' => 'Декабрь'
                                   ])
                                   ->multiple(),
]),

                            ])->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle')->unescape(),
                                    Text::make('Мета тэг (description) ', 'description')->unescape(),
                                    Text::make('Мета тэг (keywords) ', 'keywords')->unescape(),
                                    Switcher::make('Публикация', 'published')->default(1),
 BelongsTo::make('Категория', 'timetable_city', resource: new TimeTableCityResource())->nullable()->searchable(),

                                ]),


                            ])
                                ->columnSpan(6),

                        ]),
                        Grid::make([
                            Column::make([
                                Collapse::make('Основное', [


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

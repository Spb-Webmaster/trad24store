<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class CityResource extends ModelResource
{
    protected string $model = City::class;


    protected string $title = 'Города';

    protected string $column = 'city';

    protected string $sortColumn = 'sorting';
    /**
     * @return //array, выводим teaser
     */
    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),
            Text::make(__('Город'), 'city'),
            Text::make(__('Телефон'), 'phone'),
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

                    Tab::make(__('Город'), [
                        Grid::make([
                            Column::make([
                                ID::make()
                                    ->sortable(),

                                Collapse::make('Город/Телефон', [
                                    Text::make('Город', 'city')->required(),
                                    Text::make('Телефон', 'phone'),

                                ]),

                            ])
                                ->columnSpan(6),

                            Column::make([

                                Collapse::make('Дополнительно', [

                                ]),
                            ])
                                ->columnSpan(6)

                        ]),

                    ]),

                ]),
            ]),

        ];

    }


    /**
     * @return //валидация
     */

    public function rules(Model $item): array
    {
        return [];
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
        return ['create',/* 'view',*/  'update', 'delete', 'massDelete'];
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

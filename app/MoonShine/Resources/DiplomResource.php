<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Diplom;

use Illuminate\Validation\Rule;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
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
 * @extends ModelResource<Diplom>
 */
class DiplomResource extends ModelResource
{
    protected string $model = Diplom::class;

    protected string $title = 'Дипломы';

    protected string $column = 'title';

    protected string $sortColumn = 'title';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Диплом', 'title')
                ->useOnImport()
                ->showOnExport(),
            Text::make('ФИО', 'name')
                ->useOnImport()
                ->showOnExport(),
            Text::make('Дисциплины', 'training')
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
            Text::make('ФИО', 'name'),
            Text::make(__('Диплом'), 'title'),
            Date::make(__('Дата выдачи'), 'date')
                ->format("d.m.Y"),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Text::make('Дисциплина', 'training'),




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


                                Collapse::make('Диплом', [
                                    Text::make('Диплом', 'title')->required(),
                                    Text::make(__('ФИО'), 'name'),
                                    Text::make(__('Дисциплина'), 'training'),


                                ]),


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Дата', [

                                    Date::make(__('Дата выдачи'), 'date')
                                        ->format("d.m.Y")
                                        ->default(now()->toDateTimeString())
                                        ->sortable(),
                                    Switcher::make('Публикация', 'published')->default(1),

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
            'title' =>  Rule::unique('diploms')->ignore($item->id),
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

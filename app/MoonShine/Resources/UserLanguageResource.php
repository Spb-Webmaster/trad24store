<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserLanguage;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<UserLanguage>
 */
class UserLanguageResource extends ModelResource
{
    protected string $model = UserLanguage::class;

    protected string $title = 'Языки  медиации';

    protected string $column = 'title';


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

            Text::make('Заголовок', 'title')->required(),
            Slug::make('Алиас', 'slug')
                ->from('title')->unique()




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
                                        ->from('title')->unique()
                                ]),




                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [



                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Grid::make([
                            Column::make([
                                Collapse::make('Основное', [


                                    Divider::make(),



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

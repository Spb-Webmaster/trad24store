<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserNew;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
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
 * @extends ModelResource<UserNew>
 */
class UserNewResource extends ModelResource
{
    protected string $model = UserNew::class;

    protected string $title = 'Новости';

    protected string $column = 'title';

    protected string $sortColumn = 'created_at';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    public function filters(): array
    {
        return [
            ID::make(),

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

            Text::make('Заголовок', 'title')->required(),
            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y"),




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

                                    Collapse::make('Изображение', [

                                    Json::make('Изображение', 'image')->fields([

                                        Switcher::make('Вывести на полную страницу', 'json_published')->default(1)->hint('Если включен переключатель, то изображение будет выведено на полную страницу материала.'),

                                        Image::make(__('Изображение'), 'json_image')
                                            ->disk(config('moonshine.disk', 'moonshine'))
                                            ->dir('user_page')
                                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                            ->removable(),

                                    ])->vertical()->creatable(false)->removable(),
                                    ]),

                                ]),




                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Публикация', [

                                    Switcher::make('Публикация', 'published')->default(1),
                                    Date::make(__('Дата создания'), 'created_at')
                                        ->format("d.m.Y"),

                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Grid::make([
                            Column::make([
                                Collapse::make('Основное', [
                                    TinyMce::make('Краткое описание', 'teaser'),
                                    TinyMce::make('Описание', 'desc'),

                                    Divider::make(),

                                    Image::make('Галерея', 'gallery')
                                        ->dir('user_page')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->multiple()
                                        ->removable(),

                                    Divider::make(),
                                    Collapse::make('Изображение', [

                                    Json::make('Файлы', 'file')->fields([
                                        Text::make('Заголовок', 'json_file_title'),

                                        Select::make('Формат', 'json_file_format')->options([
                                            'word' => 'Word',
                                            'pdf' => 'PDF',
                                            'excel' => 'Excel',
                                            'jpg' => 'JPG',
                                            'png' => 'PNG',
                                        ]),

                                        File::make('Сам файл', 'json_file_file')
                                            ->dir('user_page')
                                            ->disk(config('moonshine.disk', 'moonshine'))
                                            ->removable(),

                                    ])->vertical()->creatable(limit: 30)->removable(),
                                    ]),

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

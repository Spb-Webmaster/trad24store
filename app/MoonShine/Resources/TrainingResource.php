<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;

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
 * @extends ModelResource<Training>
 */
class TrainingResource extends ModelResource
{
    protected string $model = Training::class;

    protected string $title = 'Обучение';

    protected string $column = 'sorting';

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

            Image::make(__('Изображение'), 'img_teaser'),
            Text::make(__('Заголовок'), 'title'),
            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y"),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Меню', 'published_menu')->updateOnPreview(),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),
            Number::make('Сортировка','sorting')->buttons()->default(999)



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


                                ]),


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle')->unescape(),
                                    Text::make('Мета тэг (description) ', 'description')->unescape(),
                                    Text::make('Мета тэг (keywords) ', 'keywords')->unescape(),
                                    Switcher::make('Публикация', 'published')->default(1),
                                    Number::make('Сортировка','sorting')->buttons()->default(999)

                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Grid::make([
                            Column::make([
                                Collapse::make('Анонс', [
                                    Image::make(__('Изображение в анонс'), 'img_teaser')
                                        ->showOnExport()
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('page')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable(),
                                    Text::make('Заголовок анонса', 'title_teaser')->hint('Если поле не заполнено, выведется заголовок'),
                                    Textarea::make('Описание анонса', 'text_teaser')->hint('Если поле не заполнено, ничего не выведется'),
                                ]),

                                Collapse::make('Меню', [

                                    Switcher::make('Публикация в меню', 'published_menu')->default(1),
                                    Text::make('Заголовок путкта меню', 'title_menu')->hint('Если поле не заполнено, выведется заголовок'),
                                ]),



                            ])->columnSpan(6),
                            Column::make([

                                Collapse::make('Дата', [

                                    Date::make(__('Дата создания'), 'created_at')
                                        ->format("d.m.Y")
                                        ->default(now()->toDateTimeString())
                                        ->sortable()

                                ]),

                            ])->columnSpan(6),


                        ]),


                        Grid::make([
                            Column::make([
                                Collapse::make('Основное', [
                                    Divider::make('Верхнее изображение на страницу'),

                                    Image::make(__('Изображение'), 'img_top')
                                        ->showOnExport()
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('page')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->hint('Растягивается на 100% ширины'),

                                    Divider::make(),

                                    TinyMce::make('Описание', 'text'),

                                    Divider::make('Нижнее изображение на страницу'),

                                    Image::make(__('Изображение'), 'img_bottom')
                                        ->showOnExport()
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('page')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable()
                                        ->hint('Растягивается на 100% ширины'),
                                    Divider::make(),

                                    TinyMce::make('Описание', 'text2'),
                                ]),
                            ])->columnSpan(12)

                        ]),
                        Grid::make([
                            Column::make([
                                Divider::make(),
                                Json::make('Модули', 'module')->fields([
                                    Select::make('', 'mod_id')
                                        ->options(
                                            config('site.modules')
                                        )->hint('Модуль будет опубликован на странице'),

                                ])->vertical()->creatable(limit: 15)
                                    ->removable(),


                            ])->columnSpan(6),
                        ]),
                    ]),


                    Tab::make(__('FAQ'), [
                        Grid::make([
                            Column::make([
                                Collapse::make('Вопрос/Ответ', [
                                    Text::make('Заголовок', 'faq_title')->hint('Модуль будет опубликован на странице только при заполнении заголовка'),

                                    Json::make('Вопрос-ответ', 'faq')->fields([
                                        Textarea::make('Вопрос', 'faq_question'),
                                        TinyMce::make('Ответ', 'faq_answer')


                                    ])->vertical()->creatable(limit: 50)
                                        ->removable(),

                                ]),
                            ])->columnSpan(12),
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

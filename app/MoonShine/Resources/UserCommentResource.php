<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserComment;

use MoonShine\Components\Badge;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
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
 * @extends ModelResource<UserComment>
 */
class UserCommentResource extends ModelResource
{
    protected string $model = UserComment::class;

    protected string $title = 'Отзывы';

    protected string $column = 'created_at';

    protected string $sortColumn = 'created_at';



    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make(),
            Text::make('Название', 'title'),
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
            Text::make('Комментатор', 'title'),
            Switcher::make('Email', 'email'),
            Switcher::make('Телефон', 'phone'),
            Switcher::make('Отзыв', 'desc'),

            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString()),
            Number::make('', 'stars')->stars()
                ->min(0)
                ->max(5)
                ->step(1)->default(0),
            BelongsTo::make('Для пользователя', 'user', resource: new UserResource())->searchable(),
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


                                Collapse::make('Имя/Email/Телефон', [
                                    Text::make('Имя', 'title'),
                                    Text::make(__('Email'), 'email'),
                                    Text::make(__('Телефон'), 'phone'),


                                ]),


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Публикация', [

                                    BelongsTo::make('Для пользователя', 'user', resource: new UserResource())->searchable(),

                                    Switcher::make('Публ.', 'published')->updateOnPreview(),




                                ]),

                                Collapse::make('Звезды', [


                                    Number::make('', 'stars')
                                        ->min(0)
                                        ->max(5)
                                        ->step(1)->default(0),




                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Grid::make([
                            Column::make([
                                Collapse::make('Основное', [
Textarea::make('Отзыв', 'desc')->hint('Доступны некоторые html теги (br,strong)')

                                ]),
                            ])->columnSpan(12)

                        ]),
                    ]),


                ]),


            ]),
        ];


    }


    public function rules(Model $item): array
    {
        return [
            'title' => 'max:2024'
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

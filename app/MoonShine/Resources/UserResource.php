<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
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
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Пользователи сайта';

    protected string $column = 'avatar';

    protected string $sortColumn = 'updated_at';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Имя', 'name')
                ->useOnImport()
                ->showOnExport(),
            Text::make('Email', 'email')
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
            Image::make(__('Аватар'), 'avatar')->sortable(),

            Text::make(__('Имя'), 'name')->sortable(),
            Slug::make(__('Телефон'), 'phone'),
            Slug::make(__('Email'), 'email'),
            Date::make(__('Дата регистрации'), 'created_at')
                ->format("d.m.Y"),
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


                                Collapse::make('Имя/Email', [
                                    Text::make('Имя', 'name')->required(),
                                    Text::make(__('Email'), 'email'),

                                ]),


                                Collapse::make('Изображение', [
                                    Image::make(__('Аватар'), 'avatar')
                                        ->showOnExport()
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('users')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable(),
                                ]),

                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Публикация', [

                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Grid::make([
                            Column::make([
                                Collapse::make('Основное', [


                                ]),
                            ])->columnSpan(12)

                        ]),
                        Grid::make([
                            Column::make([

                                Collapse::make('Средства сязи', [
                                    Text::make('Телефон', 'phone'),
                                    Text::make('Telegram', 'telegram'),
                                    Text::make('WhatsApp', 'whatsapp'),
                                    Text::make('Instagram', 'instagram'),
                                    Text::make('FaceBook', 'social'),
                                    Text::make('Website', 'website'),
                                ]),
                            ])->columnSpan(6),
                            Column::make([
                                Collapse::make('Документы', [

                                    Json::make('Удостоверение личности', 'user_idcard')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),
                                    Json::make('Справка об отсуствии судимости', 'user_judge')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),
                                    Json::make('Справка с псих диспансера', 'user_crazy')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),
                                    Json::make('Справка о регистрации', 'user_diplom')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                    Json::make('Общий курс медиатора', 'user_cert_mediator')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                    Json::make('Спец. курс медиатора', 'user_special_cert_mediator')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                    Json::make('Курс тренер медиатор', 'user_mediator_trener')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                    Json::make('Курс тренер медиатор', 'user_mediator_trener')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                    Json::make('Справка о регистрации', 'user_registered')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                    Json::make('Устав', 'user_statute')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                    Json::make('Приказ на первого руководителя', 'user_order_head')->fields([
                                        File::make('Документ', 'json_file_file')
                                            ->dir('doc')
                                            ->disk('moonshine') // Filesystems disk
                                            ->removable()

                                    ])->vertical()->creatable(limit: 5)
                                        ->removable(),

                                ]),

                            ])->columnSpan(6),
                        ]),
                    ]),


                    Tab::make(__('Пароль'), [
                        Grid::make([
                            Column::make([
                                Collapse::make('Пароль', [

                                    Password::make(__('moonshine::ui.resource.password'), 'password')
                                        ->customAttributes(['autocomplete' => 'new-password'])
                                        ->hideOnIndex()
                                        ->hideOnDetail()
                                        ->eye(),

                                    PasswordRepeat::make(__('moonshine::ui.resource.repeat_password'), 'password_repeat')
                                        ->customAttributes(['autocomplete' => 'confirm-password'])
                                        ->hideOnIndex()
                                        ->hideOnDetail()
                                        ->eye(),


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

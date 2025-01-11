<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\Badge;
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
use MoonShine\Fields\Hidden;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Fields\Position;
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
 * @extends ModelResource<User>
 * @method
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Пользователи сайта';

    protected string $column = 'name';

    protected string $sortColumn = 'id';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function pay_date()
    {
        $time = strtotime('+1 year', time());
        return date('d.m.Y', $time);


    }

    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Имя', 'name'),
            Switcher::make('Менеджер.', 'manager'),
            Switcher::make('Подписка', 'pay'),

            Text::make('Email', 'email'),
            BelongsTo::make('Категория', 'user_type', resource: new UserTypeResource())->searchable(),
            BelongsToMany::make('Язык', 'user_language', 'title', resource: new UserLanguageResource())->selectMode(),
            BelongsToMany::make('Города', 'user_city', 'title', resource: new UserCityResource())->selectMode(),
            BelongsToMany::make('Виды медиации', 'user_list', 'title', resource: new UserListResource())->selectMode(),
            Number::make('Звезды', 'stars')
                ->stars()
                ->min(0)
                ->max(5)
            ,

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
            BelongsTo::make('Кат.', 'user_type', resource: new UserTypeResource()),




            Text::make(__('Имя'), 'name')->sortable(),
            Slug::make(__('Телефон'), 'phone'),
            Slug::make(__('Email'), 'email'),
            Switcher::make('Статус', 'status'),
            Switcher::make('Публ.', 'published')->updateOnPreview(),
            /**Switcher::make('Публ. контактов', 'active_contact'),*/

            BelongsToMany::make('Язык', 'user_language', 'title', resource: new UserLanguageResource())->inLine(
                separator: '<br>',
                badge: fn($model, $value) => Badge::make($value, 'success'),

            ),
            Json::make('Pay', 'pay')->fields([
                Switcher::make('', 'pay_status'),

            ])->creatable(false),


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
                                Collapse::make('Сделать пользователя менеджером', [

                                    Switcher::make('Менеджер', 'manager')->default(0)->hint('Включая эту опцию, вы добавляете пользователю большие полномочия, по редактированию личного кабинета других пользователей'),

                                ]),

                            ])
                                ->columnSpan(12),
                        ]),
                        Grid::make([
                            Column::make([


                                Collapse::make('Имя/Email', [
                                    Text::make('Имя', 'name')->required(),
                                    Text::make(__('ФИО'), 'username'),
                                    Text::make(__('Email'), 'email'),
                                    Select::make('Пол', 'sex')->options([
                                        'Мужчина' => 'Мужчина',
                                        'Женщина' => 'Женщина'
                                    ])

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

                                    Switcher::make('Публикация контактов', 'active_contact')->default(1),

                                    Switcher::make('Статус действующий', 'status')->default(1),


                                    BelongsTo::make('Категория', 'user_type', resource: new UserTypeResource())
                                        ->searchable(),


                                ]),


                                Collapse::make('Платно', [



                                Json::make('Платное размещение', 'pay')->fields([

                                        Select::make('Статус', 'pay_status')->options([
                                            '0' => 'Нет',
                                            '1' => 'Включена',
                                            '2' => 'В ожидании',
                                        ])->default(0),
                                        Date::make('Дата окончания', 'pay_date'),

                                    ])->creatable(false)->vertical(),

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
                                    Text::make('Организация', 'company'),
                                    Textarea::make('Сфера деятельности', 'sphere'),
                                    Textarea::make('Опыт работы', 'oput'),
                                    Textarea::make('Дополнительно', 'dop'),
                                    Collapse::make('Виды медиации', [

                                        BelongsToMany::make('', 'user_list', 'title', resource: new UserListResource())->selectMode(),

                                    ]),
                                    Collapse::make('Язык медиации', [

                                        BelongsToMany::make('', 'user_language', 'title', resource: new UserLanguageResource())->selectMode(),

                                    ]),
                                    Collapse::make('Города медиации', [

                                        BelongsToMany::make('', 'user_city', 'title', resource: new UserCityResource())->selectMode(),

                                    ]),


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

                                Collapse::make('Адрес', [

                                    Text::make('Улица', 'street'),
                                    Text::make('Дом', 'home'),
                                    Text::make('Офис/Квартира', 'office'),

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

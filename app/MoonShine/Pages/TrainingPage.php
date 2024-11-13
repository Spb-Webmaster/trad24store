<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;


use Illuminate\Support\Facades\Storage;
use MoonShine\Components\Card;
use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\File;
use MoonShine\Fields\Hidden;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class TrainingPage extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Обучение';
    }


    public function setting()
    {

        if (Storage::disk('config')->exists('moonshine/training.php')) {
            $result = include(storage_path('app/public/config/moonshine/training.php'));
        } else {
            $result = null;
        }

        return (is_array($result)) ? $result : null;

    }



    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
    {

        if(!is_null($this->setting())) {
            extract($this->setting());
        }


        return [

            FormBuilder::make('/moonshine/training', 'POST')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Настройки'), [


                            Grid::make([


                                Column::make([
                                    Collapse::make('Обучение', [

                                        TinyMce::make('Описание', 'index_desc')->default((isset($index_desc))? $index_desc :''),



                                    ]),

                                ])->columnSpan(6),

                                Column::make([

                                    Collapse::make('Метотеги', [
                                        Text::make('Мета тэг (title) ', 'metatitle')->unescape()->default((isset($metatitle))? $metatitle :''),
                                        Text::make('Мета тэг (description) ', 'description')->unescape()->default((isset($description))? $description :''),
                                        Text::make('Мета тэг (keywords) ', 'keywords')->unescape()->default((isset($keywords))? $keywords :''),

                                    ]),

                                ])->columnSpan(6),
                            ]),
                        ]),

                        Tab::make(__('FAQ'), [
                            Grid::make([
                                Column::make([
                                    Collapse::make('Вопрос/Ответ', [
                                        Text::make('Заголовок', 'faq_title')->hint('Модуль будет опубликован на странице только при заполнении заголовка')->default((isset($faq_title))? $faq_title : ''),

                                        Json::make('Вопрос-ответ', 'faq')->fields([
                                            Textarea::make('Вопрос', 'faq_question'),
                                            TinyMce::make('Ответ', 'faq_answer')


                                        ])->vertical()->creatable(limit: 50)
                                            ->removable()->default((isset($faq))? $faq : ''),

                                    ]),
                                ])->columnSpan(12),
                            ]),

                        ]),

                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }
}

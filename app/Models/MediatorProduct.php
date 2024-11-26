<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MediatorProduct extends Model
{
    protected $table = 'mediator_products';
    protected $fillable = [
        'title',
        'slug',
        'subtitle',

        'title_teaser',
        'img_teaser',
        'text_teaser',
        'published_menu',
        'title_menu',
        'mediator_category_id',

        'img',
        'img_top',
        'text',
        'img_bottom',
        'text2',
        'gallery',

        'faq_title',
        'faq',

        'published',
        'params',
        'komanda_address',
        'komanda_phone1',
        'komanda_phone2',
        'komanda_phone3',
        'komanda_email',
        'komanda_website',
        'file',

        'metatitle',
        'description',
        'keywords',
        'sorting'];


    protected $casts = [
        'params' => 'collection',
        'faq' => 'collection',
        'module' => 'collection',
        'gallery' => 'collection',
        'file' => 'collection',
    ];


    public function mediator_category(): BelongsTo
    {
        return $this->belongsTo(MediatorCategory::class);
    }


    public function getGalleryVisibleAttribute()
    {

        if ($this->gallery) {
            foreach ($this->gallery as $g) {
                if ($g) { // если хоть одно фото, то нужно!
                    return true;
                }

            }
        }
        return false;

    }


    public function getFileVisibleAttribute()
    {

        if($this->file) {
            foreach ($this->file as $g) {
                if ($g) { // если хоть одно фото, то нужно!
                    return true;
                }

            }
        }
        return false;

    }

    public function getModelNameAttribute()
    {

        return $this->getTable();
    }


    public function getArrayModulesAttribute()
    {
        /*      0  =>     '-',
                1  =>     'Услуги',
                2 =>      'Обучение',
                3 =>      'Преимущества медиации',
                4 =>      'Реестр медиаторов',
                5 =>      'Полезное (новости)',
                6 =>      'Партнеры',
                7 =>      'Форма',
        */

        if ($this->module) {


            $mod = [];
            foreach ($this->module as $m) {
                if ($m['mod_id'] != 0) {

                    $mod[$m['mod_id']] = 'modules.module_' . $m['mod_id'];
                }
            }

        }

        return $mod;
    }


    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        #  static::saving(function ($Moonshine) {   });


        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });


    }
}

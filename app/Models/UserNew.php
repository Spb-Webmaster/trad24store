<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNew extends Model
{
    protected $table = 'user_news';

    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'image',
        'desc',
        'teaser',
        'gallery',
        'file',
        'published',
        'params',
        'sorting',
    ];

    protected $casts = [
        'params' => 'collection',
        'gallery' => 'collection',
        'file' => 'collection',
        'image' => 'collection'
    ];

    /**
     * @return bool
     * проверка, что есть фото
     * $item->json_exists
     */
    public function getImageExistsAttribute(): bool
    {
        if (isset($this->image)) {
            foreach ($this->image as $image) {
                if($image['json_image']) {
                    return true;
                }
            }

        }
        return false;
    }
    /**
     * @return bool | string
     * проверка, что есть фото
     * $item->json_image
     */
    public function getJsonImageAttribute(): string | bool
    {
        if (isset($this->image)) {
            foreach ($this->image as $image) {
                if($image['json_image']) {
                    return (is_null($image['json_image'])) ? false : $image['json_image'];
                }
            }

        }
        return false;
    }


    /**
     * @return bool | string
     * изображение будет выведено на полную страницу материала
     * $item->json_image_full_page
     */
    public function getJsonImageFullPageAttribute(): string | bool
    {
        if (isset($this->image)) {
            foreach ($this->image as $image) {
                if($image['json_published']) {
                    return (is_null($image['json_image'])) ? false : $image['json_image'];
                }
            }

        }
        return false;
    }


    /**
     * @return bool
     * Проверка, нужно ли выводить галерею
     * $item->gallery_visible
     */
    public function getGalleryVisibleAttribute()
    {

        if ($this->gallery) {
            foreach ($this->gallery as $g) {
                if ($g) {  /**  если хоть один файл, то нужно! */
                    return true;
                }

            }
        }
        return false;

    }


    /**
     * @return bool
     * Проверка, нужно ли выводить файлы
     * $item->file_visible
     */
    public function getFileVisibleAttribute()
    {

        if($this->file) {
            foreach ($this->file as $g) {
                if ($g['json_file_file']) { /**  если хоть один файл, то нужно! */
                    return true;
                }

            }
        }
        return false;

    }





    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        static::saving(function ($Moonshine) {

        });


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

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Domain\User\QueryBuilders\SearchQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'username',
        'company',
        'avatar',
        'city',
        'sphere',

        'home',
        'street',
        'office',

        'oput',
        'dop',

        'phone',
        'telegram',
        'whatsapp',
        'instagram',
        'social',
        'website',

        'user_idcard', //1
        'user_judge', //2
        'user_crazy', //3
        'user_diplom', //4
        'user_cert_mediator', //5
        'user_special_cert_mediator', //6
        'user_mediator_trener', //7
        'user_registered', //8
        'user_statute', //9
        'user_order_head', //10

        'user_type_id',
        'user_list_id',
        'user_city_id',
        'status',

        'published',
        'params',
        'teacher',
        'sex',
        'active_contact',
        'certificate',
        'birthday',
        'stars',
        'old_id',
    ];

    protected $casts = [
        'params' => 'collection',
        'user_idcard' => 'collection', //1
        'user_judge' => 'collection', //2
        'user_crazy' => 'collection', //3
        'user_diplom' => 'collection', //4
        'user_cert_mediator' => 'collection', //5
        'user_special_cert_mediator' => 'collection', //6
        'user_mediator_trener' => 'collection', //7
        'user_registered' => 'collection', //8
        'user_statute' => 'collection', //9
        'user_order_head' => 'collection', //10
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function user_type(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }

    public function user_mediator(): HasMany
    {
        return $this->hasMany(UserMediator::class);
    }

    public function user_list(): BelongsToMany
    {
        return $this->belongsToMany(UserList::class);
    }

    public function user_language(): BelongsToMany
    {
        return $this->belongsToMany(UserLanguage::class);
    }

    public function user_city(): BelongsToMany
    {
        return $this->belongsToMany(UserCity::class);
    }

    public function user_comment(): HasMany
    {
        return $this->hasMany(UserComment::class);
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function getUserMediatorSumAttribute()
    {

        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->sem;
                $result[] = $item->ugo;
                $result[] = $item->gra;
                $result[] = $item->uve;
                $result[] = $item->kor;
                $result[] = $item->tru;
                $result[] = $item->ban;

            }

            return array_sum($result);

        }
        return 0;


    }


    public function getUserMediatorSemAttribute()
    {
        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->sem;
            }

            return array_sum($result);

        }
        return 0;

    }

    public function getUserMediatorUgoAttribute()
    {
        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->ugo;
            }

            return array_sum($result);

        }
        return 0;

    }

    public function getUserMediatorGraAttribute()
    {
        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->gra;
            }

            return array_sum($result);

        }
        return 0;

    }

    public function getUserMediatorKorAttribute()
    {
        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->kor;
            }

            return array_sum($result);

        }
        return 0;

    }

    public function getUserMediatorUveAttribute()
    {
        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->uve;
            }

            return array_sum($result);

        }
        return 0;

    }

    public function getUserMediatorTruAttribute()
    {
        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->tru;
            }

            return array_sum($result);

        }
        return 0;

    }

    public function getUserMediatorBanAttribute()
    {
        if (count($this->user_mediator)) {

            foreach ($this->user_mediator as $item) {
                $result[] = $item->ban;
            }

            return array_sum($result);

        }
        return 0;

    }

    public function getUserTeacherAttribute()
    {

        if ($this->teacher == 1) {

            return 'Преподаватель';
        }

        return false;

    }

    public function getUserStatusAttribute()
    {

        if ($this->status == 1) {

            return 'Действующий';
        }
        if ($this->status == 0) {

            return 'Приостановлен';
        }
        return false;

    }

    public function getUserListVisibleAttribute()
    {

        if ($this->user_list) {
            foreach ($this->user_list as $g) {
                if ($g->title) { // если хоть одно фото, то нужно!
                    return true;
                }

            }
        }
        return false;

    }

    public function getUserFirstCityAttribute()
    {

        if ($this->user_city) {


            foreach ($this->user_city as $g) {

                if ($g->title) { // нашли первый город
                    return $g->title;
                }

            }
        }
        return false;

    }


    /**
     * Создание метода вывода со своим ContactQueryBuilder
     */
    public function newEloquentBuilder($query): SearchQueryBuilder
    {
        return new SearchQueryBuilder($query);
    }


    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        static::saving(function ($Moonshine) {

            $Moonshine->phone = phone($Moonshine->phone);

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

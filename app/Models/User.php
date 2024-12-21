<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Domain\User\QueryBuilders\SearchQueryBuilder;
use Domain\User\ViewModels\UserFilesViewModel;
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
        return $this->hasMany(UserMediator::class)->orderBy('created_at', 'desc');
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

    public function getUserAttribute()
    {

        if($this->username) {
            return $this->username;
        }
        return $this->name;


    }

    /**
     * @return float|int
     * user_mediator_sum
     * Все медиации пользователя
     */

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

    /**
     * @return float|int
     * user_mediator_sem
     * Медиация - семейная
     */


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

    /**
     * @return float|int
     * user_mediator_ugo
     * Медиация - Уголовная
     */

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

    /**
     * @return float|int
     * user_mediator_gra
     * Медиация - Гражданская
     */

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
    /**
     * @return float|int
     * user_mediator_kor
     * Медиация - Корпаративная
     */
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
    /**
     * @return float|int
     * user_mediator_uve
     * Медиация - Ювенальная
     */
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
    /**
     * @return float|int
     * user_mediator_tru
     * Медиация - Трудовая
     */
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

    /**
     * @return float|int
     * user_mediator_ban
     * Медиация - Банковские споры
     */

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

    public function getCitiesAttribute()
    {

        return UserCity::query()->select('id', 'title')->get();

    }

    public function getLanguagesAttribute()
    {

        return UserLanguage::query()->select('id', 'title')->get();

    }

    public function getListsAttribute()
    {

        return UserList::query()->select('id', 'title')->get();

    }

    public function getTypesAttribute()
    {

        return UserType::query()->select('id', 'title')->get();

    }


    public function getCityAttribute(): array|bool
    {
        if (count($this->user_city)) {

            foreach ($this->user_city as $item) {
                $result[$item->id] = $item->title;
            }

            return $result;

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
     * @return array
     * файлы пользоватеоей
     * Удостоверение личности
     * $user->files_user_idcard
     */
    public function getFilesUserIdcardAttribute()
    {

        if ($this->user_idcard) {
            $ok = false;
            $arr = array();
            foreach ($this->user_idcard as $k => $g) {
                if ($g['json_file_file']) {
                    $ok = true;
                }
            }
            if ($ok) {
                $arr = UserFilesViewModel::make()->json_files($this->user_idcard);
            }
            return $arr;

        }
        return [];

    }

    /**
     * @return array
     * файлы пользоватеоей
     * Справка об отсуствии судимости:
     * $user->files_user_judge
     */

    public function getFilesUserJudgeAttribute()
    {

        if ($this->user_judge) {
            $ok = false;
            $arr = array();
            foreach ($this->user_judge as $k => $g) {
                if ($g['json_file_file']) {
                    $ok = true;
                }
            }
            if ($ok) {
                $arr = UserFilesViewModel::make()->json_files($this->user_judge);
            }
            return $arr;

        }
        return [];

    }


    /**
     * @return array
     * файлы пользоватеоей
     * Справка с псих диспансера:
     * $user->files_user_judge
     */

    public function getFilesUserCrazyAttribute()
    {

        if ($this->user_crazy) {
            $ok = false;
            $arr = array();
            foreach ($this->user_crazy as $k => $g) {
                if ($g['json_file_file']) {
                    $ok = true;
                }
            }
            if ($ok) {
                $arr = UserFilesViewModel::make()->json_files($this->user_crazy);
            }
            return $arr;

        }
        return [];

    }

    /**
     * @return array
     * файлы пользоватеоей
     * Диплом:
     * $user->files_user_diplom
     */

    public function getFilesUserDiplomAttribute()
    {

        if ($this->user_diplom) {
            $ok = false;
            $arr = array();
            foreach ($this->user_diplom as $k => $g) {
                if ($g['json_file_file']) {
                    $ok = true;
                }
            }
            if ($ok) {
                $arr = UserFilesViewModel::make()->json_files($this->user_diplom);
            }
            return $arr;

        }
        return [];

    }

    /**
     * @return array
     * файлы пользоватеоей
     * Общий курс медиатора
     * $user->files_user_cert_mediator
     */

    public function getFilesUserCertMediatorAttribute()
    {

        if ($this->user_cert_mediator) {
            $ok = false;
            $arr = array();
            foreach ($this->user_cert_mediator as $k => $g) {
                if ($g['json_file_file']) {
                    $ok = true;
                }
            }
            if ($ok) {
                $arr = UserFilesViewModel::make()->json_files($this->user_cert_mediator);
            }
            return $arr;

        }
        return [];

    }

   /**
     * @return array
     * файлы пользоватеоей
     * Спец. курс медиатора:
     * $user->files_user_special_cert_mediator
     */

    public function getFilesUserSpecialCertMediatorAttribute()
    {

        if ($this->user_special_cert_mediator) {
            $ok = false;
            $arr = array();
            foreach ($this->user_special_cert_mediator as $k => $g) {
                if ($g['json_file_file']) {
                    $ok = true;
                }
            }
            if ($ok) {
                $arr = UserFilesViewModel::make()->json_files($this->user_special_cert_mediator);
            }
            return $arr;

        }
        return [];

    }

   /**
     * @return array
     * файлы пользоватеоей
     * Курс медиатор тренер:
     * $user->files_user_mediator_trener
     */

    public function getFilesUserMediatorTrenerAttribute()
    {

        if ($this->user_mediator_trener) {
            $ok = false;
            $arr = array();
            foreach ($this->user_mediator_trener as $k => $g) {
                if ($g['json_file_file']) {
                    $ok = true;
                }
            }
            if ($ok) {
                $arr = UserFilesViewModel::make()->json_files($this->user_mediator_trener);
            }
            return $arr;

        }
        return [];

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

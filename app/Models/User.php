<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'status',

        'published',
        'params',
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


    public function user_type():BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }

    public function user_list():BelongsToMany
    {
        return $this->belongsToMany(UserList::class);
    }

    public function user_language():BelongsToMany
    {
        return $this->belongsToMany(UserLanguage::class);
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

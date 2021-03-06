<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     //m_categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
     public function getLists()
     {
         $users = User::pluck('name', 'id');
 
         return $users;
     }
     //「カテゴリ(category)はたくさんの商品(products)をもつ」というリレーション関係を定義する
     public function times()
     {
         return $this->hasMany(Time::class);
     }
 

    /**
     * ユーザー作成時にデフォルトカレンダーを登録
     */
    /* protected static function booted()
    {
        static::created(function ($user) {
            $user->calendars()->createMany([
                [
                    'name' => '仕事',
                    'color' => 'blue',
                    'visibility' => 1,
                    'user_id' => $user->id,
                ],
                [
                    'name' => 'プライベート',
                    'color' => 'green',
                    'visibility' => 1,
                    'user_id' => $user->id,
                ],
                [
                    'name' => 'その他',
                    'color' => 'red',
                    'visibility' => 1,
                    'user_id' => $user->id,
                ],
            ]);
        });
    } */

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /* public function calendars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Calendar::class);
    } */
}

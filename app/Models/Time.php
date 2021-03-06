<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['user_id','user_name', 'punchIn', 'punchOut','month','day','breakIn','breakOut','workTime','year','id','name'];
    

    //任意の月の勤怠をスコープ
    public function scopeGetMonthAttendance($query,$month) {
        return $query->where('month',$month);
    }

    //任意の月の勤怠をスコープ
    public function scopeGetDayAttendance($query,$day) {
        return $query->where('day',$day);
    }

    //「商品(products)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    use HasFactory;
}

<?php

namespace OhhInk\Rrm\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OperationLogs extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'url',
        'data',
        'ip'
    ];

    /**
     * 缓存5分钟，查询5分钟，所以展现的是10分钟内，在线的用户
     * @param  int  $minutes
     * @return mixed
     */
    public static function cacheOnlineUsers($minutes = 5)
    {
        $cache = Cache::remember('online-users', 300, function () use ($minutes) {
            return self::query()->select('user_id', 'name')->where('created_at', '>=',
                Carbon::parse('-'.$minutes.' minutes'))->groupBy('user_id')->get();
        });
        return $cache;
    }

    public static function addLoginData($ip)
    {
        OperationLogs::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'url' => '/login',
            'ip' => $ip,
            'data' => 'login'
        ]);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getAvatarAttribute($value)
    {
        $cache = Cache::remember('online-users-id-avatar-'.$this->user_id, 86400, function () {
            return $this->user()->first()->avatar;
        });
        return $cache;
    }

    public function getEmailAttribute($value)
    {
        $cache = Cache::rememberForever('online-users-id-email-'.$this->user_id, function () {
            return $this->user()->first()->email;
        });
        return $cache;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}

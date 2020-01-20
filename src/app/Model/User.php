<?php

namespace OhhInk\Rrm\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends \App\User
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'is_test'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute($value)
    {
        $roles = $this->getRoleNames();
        $str = '';
        foreach ($roles as $k => $v) {
            $str .= __('rrm::role.'.$v).',';
        }
        return rtrim($str, ',');
    }

    public static function findByEmail($email)
    {
        return self::query()->where('email',$email)->first();
    }

    public function isBindGoogle()
    {
        if ($this->google) {
            return true;
        } else {
            return false;
        }
    }

    public function updateGoogle($code)
    {
        $this->google = $code;
        $this->save();
    }
}

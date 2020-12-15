<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'name',
        'location',
        'fb_id',
        'vk_id',
        'email',
        'password',
        'active',
        'auth_token',
        'access_token',
        'remember_token',
        'access_token_expired',
        'confirm_email_token',
        'restore_password_token',
        'admin',
        'birthday_year'
    ];

    public function params()
    {
        return $this->hasMany('App\UserParam');
    }

    public function lastParams()
    {
        return $this->hasMany('App\UserParam')->latest('id');
    }
    
    public function payments()
    {
        return $this->hasMany('App\Payment')->where('active',1);
    }

    public function videoAdvices()
    {
        return $this->hasMany('App\VideoAdvice');
    }

    public function feeds()
    {
        return $this->hasMany('App\Feed');
    }
}

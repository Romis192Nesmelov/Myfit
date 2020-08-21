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

        'birthday_year',
        'height',
        'weight',
        'waist_girth',
        'hip_girth'
    ];
}

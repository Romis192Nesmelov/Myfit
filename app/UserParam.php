<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserParam extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'height',
        'weight',
        'waist_girth',
        'hip_girth',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

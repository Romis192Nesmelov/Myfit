<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['new'];

    public function feed()
    {
        return $this->hasOne('App\Feed');
    }

    public function videoAdvice()
    {
        return $this->hasOne('App\VideoAdvice');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }
}
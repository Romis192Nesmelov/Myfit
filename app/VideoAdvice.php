<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class VideoAdvice extends Model
{
    protected $fillable = ['user_id','duration','paid','message_id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function message()
    {
        return $this->belongsTo('App\Message');
    }
}
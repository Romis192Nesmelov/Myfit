<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class VideoAdvice extends Model
{
    protected $fillable = ['user_id','duration','paid','new'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
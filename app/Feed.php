<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['user_id','recipe','comment','paid','message_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function message()
    {
        return $this->belongsTo('App\Message');
    }
}
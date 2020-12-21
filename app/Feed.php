<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = ['user_id','recipe','comment','paid','new'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
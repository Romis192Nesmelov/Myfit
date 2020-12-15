<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['value','user_id','training_id','active'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function training()
    {
        return $this->belongsTo('App\Training');
    }
}
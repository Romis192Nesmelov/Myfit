<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TrainingDay extends Model
{
    protected $fillable = ['emphasis','training_id'];

    public function training()
    {
        return $this->belongsTo('App\Training');
    }

    public function videos()
    {
        return $this->hasMany('App\TrainingVideo');
    }
}
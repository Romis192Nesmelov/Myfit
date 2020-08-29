<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TrainingGoal extends Model
{
    protected $fillable = ['goal','training_id'];

    public function training()
    {
        return $this->belongsTo('App\Training');
    }
}
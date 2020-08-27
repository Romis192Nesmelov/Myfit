<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TrainingDescription extends Model
{
    protected $fillable = ['description','training_id'];

    public function training()
    {
        return $this->belongsTo('App\Training');
    }
}
<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TrainingPhoto extends Model
{
    protected $fillable = ['photo','training_id'];

    public function training()
    {
        return $this->belongsTo('App\Training');
    }
}
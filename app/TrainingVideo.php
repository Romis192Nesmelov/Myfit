<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TrainingVideo extends Model
{
    protected $fillable = ['video','training_day_id'];

    public function training()
    {
        return $this->belongsTo('App\TrainingDay');
    }
}
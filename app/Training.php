<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = ['photo','complexity','need_previous_completed','its_cardio','price','active','program_id'];

    public function descriptions()
    {
        return $this->hasMany('App\TrainingDescription');
    }

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
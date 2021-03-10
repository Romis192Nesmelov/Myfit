<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'photo',
        'complexity',
        'duration',
        'periodicity',
        'equipment',
        'need_previous_completed',
        
        'warning_title',
        'warning_description',
        'recommendation_title',
        'recommendation_description',

        'warmup_warning_title',
        'warmup_warning_description',
        'warmup_recommendation_title',
        'warmup_recommendation_description',
        
        'main_warning_title',
        'main_warning_description',
        'main_recommendation_title',
        'main_recommendation_description',
        
        'main_cardio_title',
        'main_cardio_description',
        
        'hitch_warning_title',
        'hitch_warning_description',
        'hitch_recommendation_title',
        'hitch_recommendation_description',

        'with_cardio',
        'its_cardio',
        'price',
        'active',
        'program_id'
    ];

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function goals()
    {
        return $this->hasMany('App\TrainingGoal');
    }

    public function videos()
    {
        return $this->hasMany('App\TrainingVideo');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
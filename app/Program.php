<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['photo','title','description','active'];

    public function trainings()
    {
        return $this->hasMany('App\Training');
    }
}
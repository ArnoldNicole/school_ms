<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded=[];
    public function pupils(){
    	return $this->belongsToMany(Pupil::class);
    }
    public function exams()
    {
    	return $this->hasMany(Exam::class);
    }
}

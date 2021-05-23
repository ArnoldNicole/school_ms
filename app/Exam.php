<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded=[];
    public function marks()
    {
    	return $this->hasMany(Mark::class);
    }
    public function pupil()
    {
    	return $this->belongsTo(pupil::class);
    }
    public function classes()
    {
    	return $this->belongsTo(Classes::class);
    }
}

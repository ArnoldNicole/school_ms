<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $guarded=[];
   
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function event()
    {
    	return $this->hasMany(Event::class);
    }
    public function pupil()
    {
    	return $this->belongsToMany(pupil::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $guarded=[];
    public function pupil(){
    	return $this->belongsToMany(Pupil::class);
    }
}

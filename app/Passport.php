<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    protected $guarded=[];
    public function pupil()
    {
    	return $this->belongsTo(pupil::class);
    }
}

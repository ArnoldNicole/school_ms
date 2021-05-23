<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreviousBalance extends Model
{
    protected $guarded=[];
    public function pupil()
    {
    	return $this->belongsTo(pupil::class);
    }
}

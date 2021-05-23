<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $guarded=[];
    public function exam()
    {
    	return $this->belongsTo(Exam::class);
    }
    public function pupil()
    {
    	return $this->belongsTo(pupil::class);
    }
   }

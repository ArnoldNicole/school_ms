<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pupil extends Model
{
    protected $guarded=[];
    protected static function boot(){
        parent::boot();
        static::created(function ($pupil){
            $pupil->passport()->create([
                'photo'=>'default.png',
            ]);
         });
      }
    public function pupil_subject(){
        return $this->hasOne(pupil_subjects::class);
    }
     public function parents(){
        return $this->belongsToMany(Parents::class);
    }

     public function suspensions(){
      return $this->hasMany(Suspension::class)->orderBy('created_at', 'DESC');
    }
    public function classes()
    {
      return $this->belongsToMany(Classes::class);
    }
    public function payments(){
      return $this->hasMany(Payment::class)->orderBy('created_at', 'DESC');
    }

    public function balance()
    {
      return $this->hasOne(PreviousBalance::class);
    }

    public function term(){
      return $this->belongsToMany(Term::class)->withTimestamps();
    }
    public function marks()
    {
      return $this->hasMany(Mark::class);
    }

    public function passport(){
      return $this->hasone(Passport::class);
    }
}

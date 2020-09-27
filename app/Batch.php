<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = ['course_id','batch_name','batch_year','status'];

    public function courses()
        {
            return $this->belongsTo('App\Course', 'course_id');
        }
public function student(){
    return $this->hasMany('App\Student','batch_id');
   }
   public function teacher(){
    return $this->hasMany('App\Teacher','batch_id');
   }
   public function routine(){
    return $this->hasOne('App\Routine','batch_id');
   }
}

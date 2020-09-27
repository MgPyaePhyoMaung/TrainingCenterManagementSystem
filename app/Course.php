<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name','course_duration','course_detail','course_amount'];

   public function batch(){
    return $this->hasMany('App\Batch','course_id');
   }
   public function student(){
    return $this->hasMany('App\Student','course_id');
   }
   public function teacher(){
    return $this->hasMany('App\Teacher','course_id');
   }
  
}

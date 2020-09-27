<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['course_id','batch_id','teacher_name','teacher_photo','teacher_phone','teacher_address','teacher_email','teacher_gender','date_of_birth'];
    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
    public function batches()
    {
        return $this->belongsTo('App\Batch', 'batch_id');
    }
}

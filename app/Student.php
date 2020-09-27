<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['course_id','batch_id','student_name','father_name','mother_name','student_photo','student_phone','student_address','student_email','student_gender','date_of_birth'];
    public function courses()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
    public function batches()
    {
        return $this->belongsTo('App\Batch', 'batch_id');
    }
}

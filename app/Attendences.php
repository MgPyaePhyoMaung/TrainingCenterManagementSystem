<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendences extends Model
{
    protected $fillable=['batch_id','student_id','action','date'];
}

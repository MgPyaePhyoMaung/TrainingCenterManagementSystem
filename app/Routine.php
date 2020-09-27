<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    protected $fillable=['day','starting_date','ending_date','course_id','batch_id'];
//     public function courseRoutine()
// {
//     return $this->hasOneThrough('App\Batch', 'App\Course','course_id','batch_id','id','id');
// }
public function batch()
        {
            return $this->belongsTo('App\Batch', 'batch_id');
        }
}

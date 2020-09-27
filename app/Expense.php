<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['category_id','amount','date'];
    public function category()
        {
            return $this->belongsTo('App\Category', 'category_id');
        }
}

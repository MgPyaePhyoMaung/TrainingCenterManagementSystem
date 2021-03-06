<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];
    
   public function expenses(){
    return $this->hasMany('App\Expense','category_id');
   }
}

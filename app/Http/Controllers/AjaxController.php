<?php

namespace App\Http\Controllers;
use App\Course;
use App\Batch;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    
    public function findByCourse($id){
        $results = Batch::where('course_id',$id)->get();
        return response()->json($results);
    }
    // public function test(){
    //     return response()->json(['data'=>'test']);
    // }
}

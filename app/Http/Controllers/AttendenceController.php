<?php

namespace App\Http\Controllers;
use App\Batch;
use App\Student;
use App\Course;
use App\Attendences;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findByCourse($id){
        $results = Batch::where('course_id',$id)->where('status','Not Finished')->get();
        return response()->json($results);
    }

    public function findByBatch($id,Request $request){

        
         $results = Student::where('batch_id',$id)->get();
         $date=$request->date;
         return view('attendences.show_attendences_students',compact('results','date'));
       
    }

    public function index()
    {
        $students=Student::all();
        $attens=Attendences::all();
        return view('attendences.show_attendences',compact('attens','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       $courses=Course::all();
        return view('/attendences/create_attendences',compact('courses'));
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $arr1=$request->attList;
      // dd($arr1);
         foreach($arr1 as $arr2){
          //  print_r('test'.$arr2['studentId']);
             Attendences::create([
                 
                'batch_id'=>$arr2['batch_id'],
                'student_id'=>$arr2['studentId'],
                'action'=>$arr2['attStatus'],
                'date'=>$arr2['date'],
                
              ]);        
         }
          return redirect('/attendences');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "$id";
        $students=Student::all();
        $batches=Batch::find($id);
       // dd($batches);
       // return view('attendences.attendences_studentByBatch',compact('students','batches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students=Student::all();
        $attens=Attendences::find($id);
        
        return view('attendences.edit_attendences',compact('attens','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $atten=Attendences::find($id);
      
        $atten->action=$request->attendence;
       
       
        $atten->save();
        return redirect('/attendences/'.$id.'/edit')->with('status','Hey....Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //
    }
}

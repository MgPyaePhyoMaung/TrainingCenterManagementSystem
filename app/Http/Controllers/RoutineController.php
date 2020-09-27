<?php

namespace App\Http\Controllers;
use App\Routine;
use App\Course;
use App\Batch;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findByCourse($id){
        $results = Batch::where('course_id',$id)->get();
        return response()->json($results);
    }

    public function index()
    {
        $courses=Course::all();
        $routines=Routine::all();
        return view('routines.show_routines',compact('routines','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('routines.create_routines',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->day_list);
        $validatedData = $request->validate([
      
            'course_name' => 'required',
            
            'batch_name' => 'required',
            'day_list' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
         ]);
              Routine::create([
                
                'batch_id'=>$request->batch_name,
                'day'=>implode(',',$request->day_list),
                'starting_date'=>$request->start_time,
                'ending_date'=>$request->end_time,
              ]);
          return redirect('/routines/create')->with('status','Hey.....Successful Insert!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routine=Routine::find($id);
       
        $courses=Course::all();
        return view('routines.edit_routines',compact('routine','courses'));
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
        $routine=Routine::find($id);
       
        $routine->day=implode(',',$request->day_list);
        $routine->starting_date=$request->start_time;
        $routine->ending_date=$request->end_time;
        
        $routine->save();
        return redirect('/routines/'.$id.'/edit')->with('status','Hey....Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Routine::destroy($id);
        return redirect('routines');
    }
}

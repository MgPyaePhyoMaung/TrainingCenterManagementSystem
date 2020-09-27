<?php

namespace App\Http\Controllers;
use App\Course;
use App\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches=Batch::all();
        return view('batches.show_batches',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('batches.create_batches',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
      
            'course_name' => 'required',
            
            'batch_name' => 'required',
            'batch_year' => 'required',
            'status'=>'required',
            
         ]);
              Batch::create([
                 
                'batch_name'=>$request->batch_name,
                'batch_year'=>$request->batch_year,
                'course_id'=>$request->course_name,
                'status'=>$request->status,
                
              ]);
          return redirect('/batches/create')->with('status','Hey.....Successful Insert!');
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
        $courses=Course::all();
        $batch=Batch::find($id);
        return view('batches.edit_batches',compact('courses','batch'));
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
        $batch=Batch::find($id);
        $batch->batch_name=$request->batch_name;
        $batch->batch_year=$request->batch_year;
        $batch->course_id=$request->course_name;
        $batch->status=$request->status;
       
        $batch->save();
        return redirect('/batches/'.$id.'/edit')->with('status','Hey....Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //$batch=Batch::findOrFail($request->id);
    //     echo($batch);
        Batch::destroy($id);
        return redirect('batches');
    }
}

<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        return view('courses.show_courses',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create_courses');
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
            
            'course_duration' => 'required',
            'course_detail' => 'required',
            'course_amount' => 'required',
         ]);
              Course::create([
                'course_name'=>$request->course_name,
                'course_duration'=>$request->course_duration,
                'course_detail'=>$request->course_detail,
                'course_amount'=>$request->course_amount,
              ]);
          return redirect('/courses/create')->with('status','Hey.....Successful Insert!');
       
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
        $course=Course::find($id);
        return view('courses.edit_courses',compact('course'));
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
        $course=Course::find($id);
        $course->course_name=$request->course_name;
        $course->course_duration=$request->course_duration;
        $course->course_detail=$request->course_detail;
        $course->course_amount=$request->course_amount;
        $course->save();
        return redirect('/courses/'.$id.'/edit')->with('status','Hey....Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Course::destroy($id);
        return redirect('/courses');
    }
}

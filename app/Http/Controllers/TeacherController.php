<?php

namespace App\Http\Controllers;
use App\Course;
use App\Batch;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teachersByBatch($id){
        $teachers=Teacher::all();
        $batches=Batch::find($id);
       // dd($batches);
        return view('teachers.show_teachersByBatch',compact('teachers','batches'));
    }

    public function teacher_batch(){
        $teachers=Teacher::all();
        $batches=Batch::all();
        return view('teachers.show_teacher_batch',compact('teachers','batches'));
    }
    public function index()
    {
        $teachers=Teacher::all();
        return view('teachers.show_teachers',compact('teachers'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        $batches=Batch::all();
        return view('teachers.create_teachers',compact('courses','batches'));
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
            'teacher_name' => 'required',   
             'teacher_photo'=>'required',
           'teacher_phone'=>'required',
             'teacher_address'=>'required',
           'teacher_email'=>'required',
           'teacher_gender'=>'required',
           'teacher_date_of_birth'=>'required',
           'course_id'=>'required',
           'batch_id'=>'required',
              ]);
        $file=$request->file('teacher_photo');
      // echo $file;
        $filename=uniqid().'_'.$file->getClientOriginalName();
        $file->move(public_path().'/uploads/',$filename);
      
       Teacher::create([
        'teacher_name' => $request->teacher_name,             
             'teacher_photo'=>$filename,
           'teacher_phone'=>$request->teacher_phone,
             'teacher_address'=>$request->teacher_address,
           'teacher_email'=>$request->teacher_email,
           'teacher_gender'=>$request->teacher_gender,
           'date_of_birth'=>$request->teacher_date_of_birth,
           'course_id'=>$request->course_id,
           'batch_id'=>$request->batch_id,
           ]);
  return redirect('/teachers/create')->with('status','Hey.....Successful Insert!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher=Teacher::find($id);
        return view('teachers.detail_teachers',compact('teacher'));
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
        $batches=Batch::all();
        $teacher=Teacher::find($id);
        return view('teachers.edit_teachers',compact('courses','batches','teacher'));
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
        $teacher=Teacher::find($id);
        if($request->file()){
            $file=$request->file('teacher_photo');
            $photo=uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/uploads',$photo);
            $teacher->teacher_photo=$photo;
        }
        $teacher->teacher_name=$request->teacher_name;
       
        $teacher->teacher_phone=$request->teacher_phone;
        $teacher->teacher_address=$request->teacher_address;
        $teacher->teacher_email=$request->teacher_email;
        $teacher->teacher_gender=$request->teacher_gender;
        $teacher->date_of_birth=$request->teacher_date_of_birth;
        $teacher->course_id=$request->course_id;
        $teacher->batch_id=$request->batch_id;
        $teacher->save();
        return redirect('/teachers/'.$id.'/edit')->with('status','Hey....Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        return redirect('/teachers');
    }
}

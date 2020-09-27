@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                        <i class="fa fa-user"></i> <strong>Edit Student</strong><a href="/students" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-users"></i>&nbsp;<small>View Students</small></a>
                        </div>
                        <div class="card-body card-block">
                        @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                                <form action="/students/{{$student->id}}" enctype="multipart/form-data" method="post">
                                @method('PUT')
                                @csrf
                         
                            <div class="has-success form-group">
                                <label for="student_name" class=" form-control-label">Student Name</label>
                                <input type="text" id="student_name" name="student_name" class="is-valid form-control" placeholder="Enter a student name" value="{{$student->student_name}}">
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="father_name" class=" form-control-label">Father Name</label>
                                <input type="text" id="father_name" name="father_name" class="is-valid form-control" placeholder="Enter a father's name" value="{{$student->father_name}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="mother_name" class=" form-control-label">Mother Name</label>
                                <input type="text" id="mother_name" name="mother_name" class="is-valid form-control" placeholder="Enter a mother's name" value="{{$student->mother_name}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_photo" class=" form-control-label">Photo</label>
                                <input type="file" id="student_photo" name="student_photo" class="is-valid form-control" placeholder="Choose your photo" value="{{$student->student_photo}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_phone" class=" form-control-label">Phone No</label>
                                <input type="text" id="student_phone" name="student_phone" class="is-valid form-control" placeholder="Enter a phone number" value="{{$student->student_phone}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_address" class=" form-control-label">Address</label>
                                <input type="text" id="student_address" name="student_address" class="is-valid form-control" placeholder="Enter a address" value="{{$student->student_address}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_email" class=" form-control-label">Email</label>
                                <input type="text" id="student_email" name="student_email" class="is-valid form-control" placeholder="Enter a email" value="{{$student->student_email}}">
                            </div>
                            <div class="has-success form-group">
                                <label for="student_gender" class=" form-control-label">Gender</label><br>
                                <input type="radio" id="student_gender" name="student_gender" value="Male" {{ $student->student_gender == 'Male' ? 'checked' : '' }}>&nbsp;Male&nbsp;&nbsp;
                                <input type="radio" id="student_gender" name="student_gender" value="Female" {{ $student->student_gender == 'Female' ? 'checked' : '' }}>&nbsp;Female
                            </div>
                            <div class="has-success form-group">
                                <label for="student_date_of_birth" class=" form-control-label">Birthday</label>
                                <input type="date" id="student_date_of_birth" name="student_date_of_birth" class="is-valid form-control" value="{{$student->date_of_birth}}">
                            </div>
                            <div class="has-success form-group">                                                      
                                <label for="course_id" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid" searchable="Search here.." id="course_id" name="course_id">
                                <option value="" disabled selected>Choose your course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}"
                                    @if($course->id==$student->course_id)
                                      selected="selected"
                                      @endif
                                    >{{$course->course_name}}</option>
                                @endforeach
                                </select>
                           </div>
                           <div class="has-success form-group">                                                      
                                <label for="batch_id" class=" form-control-label">Batch No</label>
                                <select class="mdb-select md-form  form-control is-valid" searchable="Search here.." id="batch_id" name="batch_id">
                                <option value="" disabled selected>Choose your course</option>
                                @foreach($batches as $bat)
                                    <option value="{{$bat->id}}"
                                    @if($bat->id==$student->batch_id)
                                      selected="selected"
                                      @endif
                                    >{{$bat->batch_name}}</option>
                                @endforeach
                                </select>
                           </div>
                    
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>
@endsection
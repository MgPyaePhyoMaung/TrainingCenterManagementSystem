@extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Create Student</strong><a href="/students" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-users"></i>&nbsp;<small>View Students</small></a>
                       
                        </div>
                        <div class="card-body card-block">
                        @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                            <form action="{{'/students'}}" method="post" enctype="multipart/form-data" >
                                @csrf
                         
                            <div class="has-success form-group">
                                <label for="student_name" class=" form-control-label">Student Name</label>
                                <input type="text" id="student_name" name="student_name" class="is-valid form-control" class="@error('student_name') is-required @enderror"  placeholder="Enter a student name">
                                @error('student_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="father_name" class=" form-control-label">Father Name</label>
                                <input type="text" id="father_name" name="father_name"   class="is-valid form-control" class="@error('father_name') is-required @enderror"  placeholder="Enter a father's name">
                                @error('father_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="mother_name" class=" form-control-label">Mother Name</label>
                                <input type="text" id="mother_name" name="mother_name" class="is-valid form-control" class="@error('mother_name') is-required @enderror"  placeholder="Enter a mother's name">
                                @error('mother_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="student_photo" class=" form-control-label">Photo</label>
                                <input type="file" id="student_photo" name="student_photo"  class="is-valid form-control" class="@error('student_photo') is-required @enderror" placeholder="Choose your photo">
                                @error('student_photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="student_phone" class=" form-control-label">Phone No</label>
                                <input type="tel" id="student_phone" name="student_phone"  class="is-valid form-control" class="@error('student_phone') is-required @enderror" placeholder="Enter a phone number">
                                @error('student_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="student_address" class=" form-control-label">Address</label>
                                <input type="text" id="student_address" name="student_address"  class="is-valid form-control" class="@error('student_address') is-required @enderror" placeholder="Enter a address">
                                @error('student_address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="student_email" class=" form-control-label">Email</label>
                                <input type="text" id="student_email" name="student_email" class="is-valid form-control" class="@error('student_email') is-required @enderror"  placeholder="Enter a email">
                                @error('student_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="student_gender" class=" form-control-label">Gender</label><br>
                                <input type="radio" id="student_gender" name="student_gender" value="Male" class="@error('student_gender') is-required @enderror">&nbsp;Male&nbsp;&nbsp;
                                <input type="radio" id="student_gender" name="student_gender" value="Female" class="@error('student_gender') is-required @enderror">&nbsp;Female
                                @error('student_gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="student_date_of_birth" class=" form-control-label">Birthday</label>
                                <input type="date" id="student_date_of_birth" name="student_date_of_birth"  class="is-valid form-control" class="@error('student_date_of_birth') is-required @enderror">
                                @error('student_date_of_birth')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">                                                      
                                <label for="course_id" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid selectpicker"  data-live-search="true" class="@error('course_id') is-required @enderror" searchable="Search here.." id="course_id" name="course_id">
                                <option value="" disabled selected>Choose your course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                                </select>
                                @error('course_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>
                           <div class="has-success form-group">                                                      
                                <label for="batch_id" class=" form-control-label">Batch No</label>
                                <select class="mdb-select md-form  form-control is-valid"  searchable="Search here.." id="batch_id" name="batch_id">
                              
                                </select>
                           </div>
                    
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script type="text/javascript">
 $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
// Material Select Initialization
$(document).ready(function() {
    
    $('#course_id').on('change', function(){
                var id = $(this).val();
                if(id){
                    $.ajax({
                        type:'get',
                        url:'/findcourse/'+id,
                        success:function(data){
                            var html='';
                          data.forEach(function(val,i){
                                html+='<option value="'+val.id+'">'+val.batch_name+'</option>'
                          });
                            $("#batch_id").html(html);
                        }
                    }); 
                }else{
                    $('#batch_id').html('<option value="">Select batch first</option>');
                    
                }
            });
});


</script>

@endsection
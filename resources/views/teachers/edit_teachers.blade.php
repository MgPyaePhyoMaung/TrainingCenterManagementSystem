@extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Create Teacher</strong><a href="/teachers" style="float:right;color:red;"><i class="fa fa-users"></i>&nbsp;<small>View Teachers</small></a>
                       
                        </div>
                        <div class="card-body card-block">
                        @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                            <form action="/teachers/{{$teacher->id}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                            <div class="has-success form-group">
                                <label for="teacher_name" class=" form-control-label">Teacher Name</label>
                                <input type="text" id="teacher_name" name="teacher_name" class="is-valid form-control" value="{{$teacher->teacher_name}}">
                                @error('teacher_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_photo" class=" form-control-label">Photo</label>
                                <input type="file" id="teacher_photo" name="teacher_photo"  class="is-valid form-control" value="{{$teacher->teacher_photo}}">
                               
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_phone" class=" form-control-label">Phone No</label>
                                <input type="tel" id="teacher_phone" name="teacher_phone"  class="is-valid form-control" value="{{$teacher->teacher_phone}}">
                              
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_address" class=" form-control-label">Address</label>
                                <input type="text" id="teacher_address" name="teacher_address"  class="is-valid form-control" value="{{$teacher->teacher_address}}">                             
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_email" class=" form-control-label">Email</label>
                                <input type="text" id="teacher_email" name="teacher_email" class="is-valid form-control" value="{{$teacher->teacher_email}}">                       
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_gender" class=" form-control-label">Gender</label><br>
                                <input type="radio" id="teacher_gender" name="teacher_gender" value="Male" {{ $teacher->teacher_gender == 'Male' ? 'checked' : '' }}>&nbsp;Male&nbsp;&nbsp;
                                <input type="radio" id="teacher_gender" name="teacher_gender" value="Female" {{ $teacher->teacher_gender == 'Female' ? 'checked' : '' }}>&nbsp;Female
                            </div>
                            <div class="has-success form-group">
                                <label for="teacher_date_of_birth" class=" form-control-label">Birthday</label>
                                <input type="date" id="teacher_date_of_birth" name="teacher_date_of_birth"  class="is-valid form-control" value="{{$teacher->date_of_birth}}">
                            </div>
                            <div class="has-success form-group">                                                      
                                <label for="course_id" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid selectpicker"  data-live-search="true" id="course_id" name="course_id">
                                <option value="" disabled selected>Choose your course</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}"
                                    @if($course->id==$teacher->course_id)
                                      selected="selected"
                                      @endif
                                    >{{$course->course_name}}</option>
                                @endforeach
                                </select>
                               
                           </div>
                           <div class="has-success form-group">                                                      
                                <label for="batch_id" class=" form-control-label">Batch No</label>
                                <select class="mdb-select md-form  form-control is-valid"  searchable="Search here.." id="batch_id" name="batch_id">
                                @foreach($batches as $bat)
                                    <option value="{{$bat->id}}"
                                    @if($bat->id==$teacher->batch_id)
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
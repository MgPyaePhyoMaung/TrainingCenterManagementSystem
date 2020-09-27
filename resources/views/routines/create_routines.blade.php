@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Create Routine</strong><a href="/routines" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-th-list"></i>&nbsp;<small>View Routine</small></a>
                       
                        </div>
                        <div class="card-body card-block">
                                 @if(session('status'))
                                     <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                            <form action="{{'/routines'}}" method="post">
                                @csrf
                            <div class="has-success form-group">                                                      
                                <label for="course_name" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid selectpicker"  data-live-search="true" id="course_name" class="@error('course_name') is-required @enderror" name="course_name">
                                    <option value="" disabled selected>Choose your course</option>
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                   @endforeach
                                </select>
                                @error('course_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>
                         
                           <div class="has-success form-group">                                                      
                                <label for="batch_name" class=" form-control-label">Batch Name</label>
                                <select class="mdb-select md-form  form-control is-valid"  id="batch_name" class="@error('batch_name') is-required @enderror" name="batch_name">
                                    <option value="" disabled selected>Choose your batch</option>
                                   
                                    
                                </select>
                                @error('batch_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>
                            
                         
                           <!-- Default inline 1-->
                           <div class="has-success form-group">                                                      
                                <label  class=" form-control-label">Choose Day</label>
                                <br>
                                <div class="d-inline">
                                <input type="checkbox"  id="day" name="day_list[]" value="Monday">
                                <label  for="day" style="font-size:15px;">&nbsp;Monday&nbsp;&nbsp;</label>
                                </div>

                                <!-- Default inline 2-->
                                <div class="d-inline">
                                <input type="checkbox"  id="day" name="day_list[]" value="Tuesday">
                                <label class="" for="day" style="font-size:15px;">&nbsp;Tuesday&nbsp;&nbsp;</label>
                                </div>

                                <!-- Default inline 3-->
                                <div class="d-inline">
                                <input type="checkbox"  id="day" name="day_list[]" value="Wednesday">
                                <label class="" for="day" style="font-size:15px;">&nbsp;Wednesday&nbsp;&nbsp;</label>
                                </div>

                                <div class="d-inline">
                                <input type="checkbox"  id="day" name="day_list[]" value="Thursday">
                                <label class="" for="day" style="font-size:15px;">&nbsp;Thursday&nbsp;&nbsp;</label>
                                </div>

                                <div class="d-inline">
                                <input type="checkbox"  id="day" name="day_list[]" value="Friday">
                                <label class="" for="day" style="font-size:15px;">&nbsp;Friday&nbsp;&nbsp;</label>
                                </div>

                               <div class="d-inline">
                                <input type="checkbox"  id="day" name="day_list[]" value="Saturday">
                                <label class="" for="day" style="font-size:15px;">&nbsp;Saturday&nbsp;&nbsp;</label>
                                </div>
                                <br>
                                <div class="d-inline">
                                <input type="checkbox"  id="day" name="day_list[]" value="Sunday">
                                <label class="" for="day" style="font-size:15px;">&nbsp;Sunday&nbsp;&nbsp;</label>
                                </div>
                            </div>
                            <div class="has-success form-group">
                                <label for="start_time" class=" form-control-label">Starting Time&nbsp;&nbsp;</label>
                                <input type="time" id="start_time" name="start_time" class="is-valid form-control" class="@error('start_time') is-required @enderror">
                                @error('start_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="has-success form-group">
                                <label for="end_time" class=" form-control-label">Ending Time</label>
                                <input type="time" id="end_time" name="end_time" class="is-valid form-control" class="@error('end_time') is-required @enderror">
                                @error('end_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                           </form>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!--script>
// Material Select Initialization
// $(document).ready(function() {
// $('.mdb-select').materialSelect();
// });
</script-->
<script type="text/javascript">
 $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
// Material Select Initialization
$(document).ready(function() {
    
    $('#course_name').on('change', function(){
                var id = $(this).val();
                if(id){
                    $.ajax({
                        type:'get',
                        url:'/routine_course/'+id,
                        success:function(data){
                            var html='';
                          data.forEach(function(val,i){
                                html+='<option value="'+val.id+'">'+val.batch_name+'</option>'
                          });
                            $("#batch_name").html(html);
                        }
                    }); 
                }else{
                    $('#batch_name').html('<option value="">Select batch first</option>');
                    
                }
            });
});


</script>

@endsection
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
                                <form action="/routines/{{$routine->id}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="has-success form-group">
                                <label for="course_name" class=" form-control-label">Course Name</label>
                                @foreach($courses as $course)
                                @if($course->id==$routine->batch->course_id)
                                    <input type="text" id="course_name" name="course_name" class="is-valid form-control" value="{{$course->course_name}}">
                                @endif
                               @endforeach
                            </div>
                         
                           <div class="has-success form-group">                                                      
                                <label for="batch_name" class=" form-control-label">Batch Name</label>
                                <input type="text" id="batch_name" name="batch_name" class="is-valid form-control" value="{{$routine->batch->batch_name}}">
                           </div>
                            
                        
                           <!-- Default inline 1-->
                           <div class="has-success form-group">                                                      
                                <label  class=" form-control-label">Choose Day</label>
                                <br>
                               <?php $data=explode(',',$routine->day) ;?>
                               <?php $day=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");?>
                                @foreach($day as $result)
                                    @if(in_array($result,$data) )
                                        <div class="d-inline">
                                        <input type="checkbox"  id="day" name="day_list[]" value="{{$result}}" checked>
                                        <label  for="day" style="font-size:15px;">&nbsp;{{$result}}&nbsp;&nbsp;</label>
                                        </div>
                                    @else
                                        <div class="d-inline">
                                        <input type="checkbox"  id="day" name="day_list[]" value="{{$result}}" >
                                        <label class="" for="day" style="font-size:15px;">&nbsp;{{$result}}&nbsp;&nbsp;</label>
                                        </div>
                                    @endif
                               
                               @endforeach
                            <div class="has-success form-group">
                                <label for="start_time" class=" form-control-label">Starting Time&nbsp;&nbsp;</label>
                                <input type="time" id="start_time" name="start_time" class="is-valid form-control" value="{{$routine->starting_date}}">
                                
                            </div>
                            <div class="has-success form-group">
                                <label for="end_time" class=" form-control-label">Ending Time</label>
                                <input type="time" id="end_time" name="end_time" class="is-valid form-control" value="{{$routine->ending_date}}">
                               
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
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

@endsection
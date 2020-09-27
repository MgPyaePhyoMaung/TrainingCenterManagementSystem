@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Edit Attendence</strong><a href="/attendences" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-font"></i>&nbsp;<small>View Attendences</small></a>
                        </div>
                        <div class="card-body card-block">
                                 @if(session('status'))
                                     <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                                <form action="/attendences/{{$attens->id}}" method="post">
                                @method('PUT')
                                @csrf
                         @foreach($students as $student)
                            @if($student->id==$attens->student_id)
                            <div class="has-success form-group">
                                <label for="batch_name" class=" form-control-label">Batch Name</label>
                                <input type="text" id="batch_name" name="batch_name" class="is-valid form-control" value="{{$student->batches->batch_name}}">
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="student_name" class=" form-control-label">Student Name</label>
                                <input type="text" id="student_name" name="student_name" class="is-valid form-control" value="{{$student->student_name}}">
                            </div>
                            <div class="has-success form-group">
                               
                                <input type="radio" id="present" name="attendence" value="Present" {{($attens->action=='Present')?'checked':''}}>
                                &nbsp;<label for="present" >Present</label>
                                &nbsp;&nbsp;
                                <input type="radio" id="absent" name="attendence"  value="Absent" {{($attens->action=='Absent')?'checked':''}}>
                                &nbsp;<label for="absent" >Absent</label>
                            </div>
                            <div class="has-success form-group">
                                <label for="date" class=" form-control-label">Date</label>
                                <input type="text" id="date" name="date" class="is-valid form-control" value="{{$attens->date}}">
                            </div>
                            @endif
                        @endforeach
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                           </form>
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
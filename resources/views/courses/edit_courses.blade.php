@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Edit Course</strong><a href="/courses" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-book"></i>&nbsp;<small>View Course</small></a>
                        </div>
                        <div class="card-body card-block">
                                 @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                                <form action="/courses/{{$course->id}}" method="post">
                                @method('PUT')
                                @csrf
                            <div class="has-success form-group">
                                <label for="course_name" class=" form-control-label">Course Name</label>
                                <input type="text" id="course_name" name="course_name" value="{{$course->course_name}}" class="is-valid form-control">
                            </div>
                            <div class="has-success form-group">
                                <label for="course_duration" class=" form-control-label">Course Duration</label>
                                <input type="text" id="course_duration" name="course_duration" value="{{$course->course_duration}}" class="is-valid form-control">
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="course_detail" class=" form-control-label">Course Detail</label>
                                <textarea id="course_detail" name="course_detail" class="is-valid form-control">{{$course->course_detail}}</textarea>                       
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="course_amount" class=" form-control-label">Course Amount</label>
                                <input type="number" id="course_amount" name="course_amount"  value="{{$course->course_amount}}"  class="is-valid form-control">
    
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Update</button>&nbsp;&nbsp;
                            
                             </form>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
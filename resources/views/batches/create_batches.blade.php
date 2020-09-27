@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Create Batch</strong><a href="/batches" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-bold"></i>&nbsp;<small>View Batch</small></a>
                       
                        </div>
                        <div class="card-body card-block">
                                 @if(session('status'))
                                     <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                            <form action="{{'/batches'}}" method="post">
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
                                <input type="text" id="batch_name" name="batch_name" class="is-valid form-control" class="@error('batch_name') is-required @enderror" placeholder="Enter batch name">
                                @error('batch_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="batch_year" class=" form-control-label">Batch Year</label>
                                <input type="text" id="batch_year" name="batch_year" class="is-valid form-control" class="@error('batch_year') is-required @enderror" placeholder="Enter batch year">
                                @error('batch_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="has-success form-group">                                                      
                                <label for="status" class=" form-control-label">Status</label>
                                <select class="mdb-select md-form  form-control is-valid"  id="status" class="@error('status') is-required @enderror" name="status">
                                    <option value="" disabled selected>Choose Status</option>
                                   
                                    <option value="Finished">Finished</option>
                                    <option value="Not Finished">Not Finished</option>
                                  
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                           </form>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
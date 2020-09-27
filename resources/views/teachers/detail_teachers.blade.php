@extends('layouts.master')
@section('content')
<div class="content">

    <div class="col-lg-10 ml-5">
                
         <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user"></i><strong class="card-title pl-2">Detail Teacher</strong><a href="/teachers" style="float:right;color:red;"><i class="fa fa-users"></i>&nbsp;<small>View Teachers</small></a>
                    </div>
                        <div class="card-body" style="height:40%;">
                            <div class="mx-3 mt-5 d-block">
                                <div class="row">
                                    <div class="col">
                                   
                                        <img class="rounded-circle mx-auto d-block "  src="{{asset('/uploads/'.$teacher->teacher_photo)}}" style="width:70%;height:30%;" alt="Card image cap">
                                        <br>
                                     <marquee> <h4 class="text-sm-center mt-2 mb-1"><strong>{{$teacher->teacher_name}}</strong></h4></marquee>
                                      
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-sm-6" style="text-align:center;">
                                            <large style="color:blue;">Location</large>
                                            </div>
                                            <div class="col-sm-6" style="text-align:left;">
                                            {{$teacher->teacher_address}}
                                            </div>                                      
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6" style="text-align:center;">
                                            <large style="color:blue;">Phone</large>
                                            </div>
                                            <div class="col-sm-6" style="text-align:left;">
                                            {{$teacher->teacher_phone}}
                                            </div>                                      
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6" style="text-align:center;">
                                            <large style="color:blue;">Email</large>
                                            </div>
                                            <div class="col-sm-6" style="text-align:left;">
                                            {{$teacher->teacher_email}}
                                            </div>                                      
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6" style="text-align:center;">
                                            <large style="color:blue;">Course Name</large>
                                            </div>
                                            <div class="col-sm-6" style="text-align:left;">
                                            {{$teacher->courses->course_name}}
                                            </div>                                      
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6" style="text-align:center;">
                                            <large style="color:blue;">Batch Name</large>
                                            </div>
                                            <div class="col-sm-6" style="text-align:left;">
                                            {{$teacher->batches->batch_name}}
                                            </div>                                      
                                        </div>
                                        </div>
                                     </div>
                                </div>
                                    <hr>
                                    <div class="card-text text-sm-center">
                                    <a class="px-2 fa-lg fb-ic"><i class="fa fa-facebook pr-1"></i></a>
                                        <a class="px-2 fa-lg tw-ic"><i class="fa fa-twitter pr-1"></i></a>
                                        <a class="px-2 fa-lg li-ic"><i class="fa fa-linkedin pr-1"></i></a>
                                        
                                    </div>
                                    
                            
         </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
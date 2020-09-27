@extends('layouts.master')
@section('content')
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Student</strong><input type="date" name="attendence_date" id="attendence_id" class="float-right">
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                           
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($students as $student)
                                     @if($student->batch_id==$batches->id && $student->course_id==$batches->course_id)
                                        <tr style="text-align:center;">
                                            <td>{{$student->student_name}}</td>
                                            <td><img src="{{asset('/uploads/'.$student->student_photo)}}" style="width:50%;height:25%;align:center;"></td>
                                                                                                                           
                                            <td>
                                                
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="present" id="present" value="Present">
                                                    <label class="form-check-label" for="present">
                                                    Present
                                                    </label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="absent" id="absent" value="Absent">
                                                    <label class="form-check-label" for="absent">
                                                    Absent
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                     
                                    </tbody>
                                   
                                </table>
                                <br>
                                <input type="submif" class="btn btn-info" value="Take Attendence">
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <script src="{!!asset('assets/js/lib/data-table/datatables.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/dataTables.buttons.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.bootstrap.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/jszip.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/vfs_fonts.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.html5.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.print.min.js')!!}"></script>
    <script src="{!!asset('assets/js/lib/data-table/buttons.colVis.min.js')!!}"></script>
    <script src="{!!asset('assets/js/init/datatables-init.js')!!}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
@endsection

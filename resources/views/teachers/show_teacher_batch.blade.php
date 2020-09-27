@extends('layouts.master')
@section('content')
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Show Batch With Teacher Number</strong><a href="/teachers/create" style="float:right;color:red;text-decoration: underline;text-decoration:none;"><i class="fa fa-users"></i>&nbsp;<small>New Teacher</small></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Batch No</th>
                                            <th>Batch Year</th>
                                            <th>Teacher Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=0; ?>
                                    @foreach($batches as $batch)
                                        <tr>
                                            <td>{{$batch->courses->course_name}}</td>
                                            <td>{{$batch->batch_name}}</td>
                                            <td>{{$batch->batch_year}}</td> 
                                                @foreach($teachers as $teacher)
                                                    @if($teacher->batch_id==$batch->id )
                                                    <?php $i++ ?>
                                                    @endif
                                                @endforeach
                                                
                                            <td>{{$i}}</td>
                                            <?php $i=0; ?>
                                            <td>
                                                <a href="/teachersByBatch/{{$batch->id}}">
                                                     <input type="submit" class="btn btn-success btn-sm" value="Teachers"/>
                                                 </a>
                                                
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
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

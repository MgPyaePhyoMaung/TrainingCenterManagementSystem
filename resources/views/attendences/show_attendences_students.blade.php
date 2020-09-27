@extends('layouts.master')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Attendenced Students</strong><a href="/attendences" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-font"></i>&nbsp;<small>Vew Attendence</small></a>
                            </div>

                            <div class="card-body">
                           <p name="date">{{$date}}</p>
                            <form action="/attendences" method="post">
                                    @csrf
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Batch Name</th>
                                                <th>Student Name</th>
                                                <th>Student Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php $i=0;?>
                                        <tbody>
                                        @foreach($results as $result)
                                            <tr>
                                           
                                                <td>{{$result->id}}</td>
                                                <td><input type="hidden" name="attList[{{$i}}][studentId]" value="{{$result->id}}"/>{{$result->student_name}}</td>
                                                <td><input type="radio" name="attList[{{$i}}][attStatus]" value="Present"  id="present"/>&nbsp;<label for="present">Present</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="attList[{{$i}}][attStatus]" value="Absent" id="absent"/>&nbsp;<label for="absent">Absent</label></td>
                                                <input type="hidden" name="attList[{{$i}}][date]" value="{{$date}}">
                                                <input type="hidden" name="attList[{{$i}}][batch_id]" value="{{$result->batch_id}}">
                                            </tr>
                                            <?php $i++?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                       <button type="submit" class="btn btn-success ml-3">Save</button>        
                                    <form>
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
 $.ajaxSetup({

headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});
// Material Select Initialization
$(document).ready(function() {

    $('#bootstrap-data-table-export').DataTable();

});

</script>
@endsection

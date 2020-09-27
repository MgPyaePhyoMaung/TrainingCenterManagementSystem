@extends('layouts.master')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Attendenced Students</strong><a href="/attendences/create" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-font"></i>&nbsp;<small>New Attendence</small></a>
                            </div>

                            <div class="card-body">
            
                          
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                               
                                                <th>Batch Name</th>
                                                <th>Student Name</th>
                                                <th>Student Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php $i=0;?>
                                        <tbody>
                                        @foreach($attens as $atten)
                                             @foreach($students as $student)
                                                @if($atten->student_id==$student->id) 
                                            <tr>
                                              
                                                <td>{{$student->batches->batch_name}}</td>
                                                <td><input type="hidden" name="attList[{{$i}}]['studentId']" value="{{$student->id}}"/>{{$student->student_name}}</td>
                                                <td><input type="radio" name="attList[{{$i}}]['attStatus']" value="Present"  id="present" {{($atten->action=='Present')?'checked':''}}/>
                                                &nbsp;<label for="present">Present</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="attList[{{$i}}]['attStatus']" value="Absent" id="absent" {{($atten->action=='Absent')?'checked':''}}/>&nbsp;<label for="absent">Absent</label></td>
                                                <td>{{$atten->date}}</td>
                                                <td>
                                                    <a href="/attendences/{{$atten->id}}/edit">
                                                        <input type="submit" class="btn btn-info btn-sm" value="Edit"/>
                                                    </a>&nbsp;&nbsp;&nbsp;
                                                  
                                               </td>
                                                <input type="hidden" name="attList[{{$i}}]['date']" value="{{$atten->date}}"> 
                                                <input type="hidden" name="attList[{{$i}}]['batch_id']" value="{{$atten->batch_id}}">
                                            </tr>
                                           
                                            <?php $i++?>
                                                 @endif
                                            @endforeach 
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

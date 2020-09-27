
        @extends('layouts.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                        <strong class="card-title">Create Attendence</strong><a href="/attendences" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-font"></i>&nbsp;<small>Vew Attendence</small></a>
                       
                        </div>
                        <div class="card-body card-block">
                                 @if(session('status'))
                                     <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                            <form action="" method="post" id="attendenceForm" class="d-inline">
                                @csrf
                               
                            <div class="has-success form-group">                                                      
                                <label for="course_id" class=" form-control-label">Course Name</label>
                                <select class="mdb-select md-form  form-control is-valid selectpicker"  data-live-search="true" id="course_id" class="@error('course_id') is-required @enderror" name="course_name">
                                    <option value="" disabled selected>Choose your course</option>
                                    @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                   @endforeach
                                </select>
                                @error('course_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                           </div>
                         
                            <div class="has-success form-group">
                            <label for="batch" class="form-control-label">Choose Batch</label>
                                        <select class="mdb-select md-form  form-control is-valid"  id="batch" name="batch">
                                            <!--option value="" disabled selected>Choose Batch</option-->
                                        </select>
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="date" class=" form-control-label">Choose Date</label>
                                <input type="date" id="date" name="date" class="is-valid form-control" class="@error('date') is-required @enderror" >
                                @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                           </form>
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
    $('#course_id').on('change', function(){
                var id = $(this).val();
                //alert(id);
                if(id){
                    $.ajax({
                        type:'get',
                        url:'/attendence_course/'+id,
                        success:function(data){
                            var html='';
                          data.forEach(function(val,i){
                            html+='<option value="'+val.id+'">'+val.batch_name+'</option>'
                               
                          });
                            $("#batch").html(html);
                        }
                    }); 
                }else{
                    $('#batch_id').html('<option value="">Select batch first</option>');
                    
                }
            });//attendencebyCourse

            $('#batch').on('click', function(){
                var id = $(this).val();
                $('#attendenceForm').attr('action','/attendence_batch/'+id);
            });

});

</script>
@endsection

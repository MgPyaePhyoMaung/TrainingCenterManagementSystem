@extends('layouts.master')
@section('content')
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Show Batch</strong><a href="/batches/create" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-bold"></i>&nbsp;<small>New Batch</small></a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Batch Id</th>
                                            <th>Course Name</th>
                                            <th>Batch No</th>
                                            <th>Batch Year</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($batches as $batch)
                                        <tr>
                                            <td>{{$batch->id}}</td>
                                            <td>{{$batch->courses->course_name}}</td>
                                            <td>{{$batch->batch_name}}</td>
                                            <td>{{$batch->batch_year}}</td>    
                                            <td>{{$batch->status}}</td>                                       
                                            <td>
                                                <a href="/batches/{{$batch->id}}/edit">
                                                     <input type="submit" class="btn btn-info btn-sm" value="Edit"/>
                                                 </a>&nbsp;&nbsp;&nbsp;
                                                 <button class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                        
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!-- Modal HTML -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-confirm modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header" style="background-color:#81F7F3;padding:5%;">
                <div class="row">			
			<h4 class="modal-title" id="exampleModalLabel" style="font-weight:bold;">Confirmation</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:red;">&times;</span>
        </button>
        </div>
            </div>
            <form action="" method="post" id="deleteForm">
            @method('DELETE')
                @csrf
			<div class="modal-body bgColorRed">
            <input type="hidden" name="_method"  value="DELETE"> 
                <p style="font-weight:bold;">Are you sure you want to delete your data? This action cannot be undone and you will be unable to recover any data.</p>
              
            </div>
            
			<div class="modal-footer" style="background-color:#81F7F3;">
                <a href="#" class="btn btn-success" data-dismiss="modal">Cancel</a>
				<button type="submit" class="btn btn-danger">Yes, delete it!</button>
			</div>
            </form>
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
        var table= $('.table').DataTable();
        $('.delete').on('click',function(){
            //alert('Hello');
            $tr=$(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr=$tr.prev('.parent');
            }
            var data=table.row($tr).data();
            console.log(data);
            $('#deleteForm').attr('action','/batches/'+data[0]);
           
        });
          
      } );
      </script>
    
@endsection

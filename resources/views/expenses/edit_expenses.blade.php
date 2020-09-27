@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Edit Expense</strong><a href="/expenses" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-newspaper-o"></i>&nbsp;<small>View Expense</small></a>
                        </div>
                        <div class="card-body card-block">
                        @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                                <form action="/expenses/{{$expense->id}}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="has-success form-group">                                                      
                                <label for="category_name" class=" form-control-label">Category Name</label>
                                <select class="mdb-select md-form  form-control is-valid selectpicker" data-live-search="true" id="category_name" name="category_name">
                                    <option value="" disabled selected>Choose your course</option>
                                    @foreach($categories as $category)
                                       
                                        <option value="{{$category->id}}"
                                            @if($category->id==$expense->category_id)
                                                    selected="selected"
                                            @endif
                                        >{{$category->name}}</option>
                                                
                                   @endforeach
                                </select>
                           </div>
                            
                            <div class="has-success form-group">
                                <label for="expense_amount" class=" form-control-label">Expense Amount</label>
                                <input type="number" id="expense_amount" name="expense_amount" class="is-valid form-control" value="{{$expense->amount}}">
                              
                            </div>
                            <div class="has-success form-group">
                                <label for="expense_date" class=" form-control-label">Date</label>
                                <input type="date" id="expense_date" name="expense_date"  class="is-valid form-control" value="{{$expense->date}}">
                               
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Update</button>&nbsp;&nbsp;
                            
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
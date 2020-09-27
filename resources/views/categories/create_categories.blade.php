@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Create Category</strong><a href="/categories" style="float:right;color:red;text-decoration: underline;"><i class="fa fa-tasks"></i>&nbsp;<small>View Categories</small></a>
                       
                        </div>
                        <div class="card-body card-block">
                                 @if(session('status'))
                                <p class="alert alert-success"><small>{{session('status')}}</small></p>
                                @endif
                            <form action="{{'/categories'}}" method="post">
                                @csrf
                            <div class="has-success form-group">
                                <label for="category_name" class=" form-control-label">Category Name</label>
                                <input type="text" id="category_name" name="category_name" class="is-valid form-control" class="@error('category_name') is-required @enderror" placeholder="Enter your category name">
                                @error('category_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <button type="submit" class="btn btn-outline-primary">Add</button>&nbsp;&nbsp;
                             
                             </form>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
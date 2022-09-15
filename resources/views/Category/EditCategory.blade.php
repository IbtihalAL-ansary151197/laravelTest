@extends('layouts._app')

@section('categoryForm')
    


@if (session('status'))
 
<h6 class="alert alert-success">{{session('status')}}</h6>
    
@endif
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Categories</h3>
    </div>
    <!-- /.card-header -->
    
@if (session('Messages'))
 
<h6 class="alert alert-success">{{session('Messages')}}</h6>
    
@endif
    <!-- form start -->
    <form  action="{{ route('category.update',['id'=>$category->id ?? 0 ])}}" method="post" >
        @csrf
        @method('PUT')

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="Name" class="form-control" id="exampleInputEmail1" value="{{ old('Name',$category->Name )}}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Status</label>

          <select class="custom-select" name="Status" id="inputGroupSelect01">
        
            <option @if($category->Status == "Active") selected @endif   value="Active">Active</option>
            <option @if($category->Status == "Unactive") selected @endif value="Unactive">Unactive</option>
           
          </select>
  
        </div>
     
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add Category</button>
      </div>
    </form>
  </div>
  
  @endsection
@extends('layouts._app')

@section('categoryForm')
    


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Categories</h3>
    </div>


    
@if (session('Messages'))
 
<h6 class="alert alert-success">{{session('Messages')}}</h6>
    
@endif
    <!-- /.card-header -->
    <!-- form start -->
    <form  action="{{route('category.store')}}" method="post" >
        @csrf

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="Name" value="{{ old('Name') }}" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Status</label>

          <select class="custom-select" name="Status" id="inputGroupSelect01">
            <option selected></option>
            <option  name="Status">Active</option>
            <option  name="Status">Unactive</option>
           
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
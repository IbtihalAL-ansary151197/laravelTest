
@extends('layouts._app')

@section('categoryTables')
    

<div class="card">
  <div class="card-header">
    <h3 class="card-title">All Categories</h3>
  </div>

  @if (session('Messages'))
 
<h6 class="alert alert-success">{{session('Messages')}}</h6>
    
@endif

@if (session('MessagesDeleted'))
 
<h6 class="alert alert-danger">{{session('MessagesDeleted')}}</h6>
    
@endif
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      </thead>

      <tbody>
        @foreach ($category as $category)
             
        
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->Name }}</td>
        <td>{{ $category->Status }}</td>
        <td> 
        
          <a href="{{ route('category.edit', ['category' => $category->id ?? 0 ]) }}" class="btn btn-block btn-success">Edit</a>
         
          <a href="{{ route('category.destroy', ['id' => $category->id ?? 0 ]) }}" onclick="return confirm('Are You Sure You Want To Delete This Data') " class="btn btn-block btn-danger btn-flat">Delated</a
           
        </td>
        
  
      </tr>
      
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>


@endsection

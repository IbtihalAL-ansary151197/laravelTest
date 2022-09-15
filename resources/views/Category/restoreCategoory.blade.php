
@extends('layouts._app')

@section('categoryTables')
    

<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      Restore To Deleted</h3>
  </div>

  

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
        @foreach ($categories as $category)
             
        
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->Name }}</td>
        <td>{{ $category->Status }}</td>
        <td> 
        
         
          <a href="{{ route('category.restore', ['id' => $category->id ?? 0]) }} " class="btn btn-block btn-info btn-flat">Restore</a
           
        </td>
        
  
      </tr>
      
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>


@endsection

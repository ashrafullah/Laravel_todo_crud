

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('successMsg'))
            <div class="alert alert-dismissible alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> {{ session('successMsg') }}
            </div>
        @endif
       <!--  Search form database -->

        <form action="/search" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group">
              <input type="text" class="form-control" name="employee"
                  placeholder="Search employee here"> <span class="input-group-btn">
                  <button type="submit" class="btn btn-default">
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
              </span>
          </div>
         </form><br>

         <div class="container">
          @if(isset($details))
              <p> The Search results for your query <b> {{ $query }} </b> are :</p>
          <h2>Sample User details</h2>
          <table class="table table-striped">
              <thead>
                  <tr>
                      <th>Employee</th>
                      
                  </tr>
              </thead>
              <tbody>
                  @foreach($details as $user)
                  <tr>
                      <td>{{$user->employee}}</td>
                      
                  </tr>
                  @endforeach
              </tbody>
          </table>
          @endif
        </div>

        <!--  search end from  todo list -->
        
        <!--  add employee todo list  -->

        <ul class="navbar-nav mr-auto">
                       <!-- <li><a href="{{ URL::route('main')}}">Home</a></li>&nbsp &nbsp -->
                     <li><a href="{{ route('employeecreate') }}"><button type="button" class="btn btn-info">Add New Employee</button></a></li>
              
                    </ul>
        <!--  todo list end employee add-->


    <table class="table table-bordered table-striped table-hover ">
  <thead>
  <tr>
    <th>ID</th>
    <th>Employee</th>
    <th>Time</th>
    <th class="text-center">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($employees as $employee)
    <tr>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->employee }}</td>
        <td>{{ $employee->created_at }}</td>
      
       
        <td class="text-center"><a class="btn btn-raised btn-primary btn-sm" href="{{ route('employeeedit',$employee->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> || 
          <form method="POST" id="delete-form-{{ $employee->id }}" action="{{ route('employeedelete',$employee->id) }}" style="display: none;"> 
            {{ csrf_field() }}
            {{ method_field('delete') }}
            
          </form>
            
            <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $employee->id }}').submit();
            }else{
              event.preventDefault();
            }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $employees->links() }}
</div>
@endsection
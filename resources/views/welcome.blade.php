



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
              <input type="text" class="form-control" name="task"
                  placeholder="Search task here"> <span class="input-group-btn">
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
                      <th>Task</th>
                      
                  </tr>
              </thead>
              <tbody>
                  @foreach($details as $user)
                  <tr>
                      <td>{{$user->task}}</td>
                      
                  </tr>
                  @endforeach
              </tbody>
          </table>
          @endif
        </div>
        <!--  Table for todo list -->
        <!--  add task todo list  -->

        <ul class="navbar-nav mr-auto">
                       <!-- <li><a href="{{ URL::route('main')}}">Home</a></li>&nbsp &nbsp -->
                     <li><a href="{{ route('create') }}"><button type="button" class="btn btn-info">Add New Task</button></a></li>
              
                    </ul>
        <!--  todo list end employee add end-->

    <table class="table table-bordered table-striped table-hover ">
  <thead>
  <tr>
    <th>ID</th>
    <th>Task</th>
    <th>Time</th>
    <th class="text-center">Action</th>
  </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->task }}</td>
        <td>{{ $task->created_at }}</td>
      
       
        <td class="text-center"><a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit',$task->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> || 
          <form method="POST" id="delete-form-{{ $task->id }}" action="{{ route('delete',$task->id) }}" style="display: none;"> 
            {{ csrf_field() }}
            {{ method_field('delete') }}
            
          </form>
            
            <button onclick="if(confirm('Are you Sure, You went to delete this?')){
              event.preventDefault();
              document.getElementById('delete-form-{{ $task->id }}').submit();
            }else{
              event.preventDefault();
            }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $tasks->links() }}
</div>
@endsection
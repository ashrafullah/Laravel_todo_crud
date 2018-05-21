welcome.blade.php
////////////////////

@extends('layouts.app')

@section('content')
    <div class="container">
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

    <table class="table table-bordered table-striped table-hover ">
  <thead>
  <tr>
    <th>ID</th>
    <th>task</th>
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
///////////////////////////////////////////////////////////////////////////////////////////////
app.blade.php
//////////////

<!DOCTYPE html>
<html>
<head>
  <title>Todo application with laravel using CRUD</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">
</head>
<body>
  @include('layouts.navbar')
   
  @yield('content')
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/ripples.min.js"></script>
  <script type="text/javascript">
    $.material.init()
  </script>
</body>
</html>
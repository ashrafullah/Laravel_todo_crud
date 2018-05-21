<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class ApiController extends Controller
{
    public function index_api()
    {
        $tasks = Task::paginate(4);

        return view('welcome',compact('tasks'));
    }

    public function store_api(Request $request)
    {
        $this->validate($request,[
            'task' => 'required'
           
            
        ]);

        $task = new Task;
        $task->task = $request->task;
       
        $task->save();
        //return redirect(route('main'))->with('successMsg','task Successfully Added');
        return response()->json($task, 201);


    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit',compact('task'));
    }

    public function update_api(Request $request,$id)
    {
        $this->validate($request,[
            'task' => 'required'
            
        ]);

        $task = Task::find($id);
        $task->task = $request->task;
        $task->save();
        //return redirect(route('main'))->with('successMsg','task Successfully Update');
        return response()->json($task, 200);
    }

    public function delete_api($id)
    {
       Task::find($id)->delete();
       // return redirect(route('main'))->with('successMsg','task Successfully Delete');
        return response()->json(null, 204);
    }

    
}


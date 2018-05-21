<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(4);

        return view('welcome',compact('tasks'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'task' => 'required'
           
            
        ]);

        $task = new Task;
        $task->task = $request->task;
       
        $task->save();
        return redirect(route('main'))->with('successMsg','task Successfully Added');


    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit',compact('task'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'task' => 'required'
            
        ]);

        $task = Task::find($id);
        $task->task = $request->task;
        $task->save();
        return redirect(route('main'))->with('successMsg','task Successfully Update');
    }

    public function delete($id)
    {
       Task::find($id)->delete();
        return redirect(route('main'))->with('successMsg','task Successfully Delete');
    }

    public function search()
    {
        $q = Input::get ( 'task' );
        $task = Task::where('task','LIKE','%'.$q.'%')->get();
        if(count($task) > 0)
        return view('main')->withDetails($task)->withQuery ( $q );
        else return view ('main')->withMessage('No Details found. Try to search again !');
    }

    //api code here////////////////////////////////////////////////////////////////////////////

}

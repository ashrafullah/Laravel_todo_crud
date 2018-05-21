<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(4);

        return view('employee',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'employee' => 'required'
           
            
        ]);

        $employee = new Employee;
        $employee->employee = $request->employee;
       
        $employee->save();
        return redirect(route('employee'))->with('successMsg','employee Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $employee = Employee::find($id);
        return view('employee',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'employee' => 'required'
            
        ]);

        $employee = Employee::find($id);
        $employee->employee = $request->employee;
        $employee->save();
        return redirect(route('employee'))->with('successMsg','employee Successfully Update');
    }
    public function delete($id)
    {
       Employee::find($id)->delete();
        return redirect(route('employee'))->with('successMsg','employee Successfully Delete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search()
    {
        $q = Input::get ( 'employee' );
        $employee = Employee::where('employee','LIKE','%'.$q.'%')->get();
        if(count($task) > 0)
        return view('employee')->withDetails($employee)->withQuery ( $q );
        else return view ('employee')->withMessage('No Details found. Try to search again !');
    }
}

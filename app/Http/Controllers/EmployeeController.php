<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|min:5',
            'email' => 'required'
        ]);

        $employee = Employee::created($request->all());

        if(!is_null($employee)) {
            return back()->with('success', 'Success Create New Employee');
        } 
        else {
            return back()->with('failed', 'Failed to Create New Employee , Please check again !!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'fullName' => 'required|min:5',
            'email' => 'required'
        ]);

        $employee = Employee::updated($request->all());

        if(!is_null($employee)) {
            return back()->with('success', 'Success Updated New Employee');
        } 
        else {
            return back()->with('failed', 'Failed to update this Employee , Please check again !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = $employee->delete();
        if(!is_null($employee)) {
            return back()->with('success', 'Employee Deleted');
        }
        else {
            return back()->with('failed', 'Failed to Deleted this Emplotee , tru again !!');
        }
    }
}

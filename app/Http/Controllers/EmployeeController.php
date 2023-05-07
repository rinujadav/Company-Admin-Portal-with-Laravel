<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('employees.index',compact('employees'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $previousRoute = app('router')->getRoutes()->match(app('request')->create(url()->previous()));
        $previousRouteName = $previousRoute->getName();
        $companies = Company::get();
        return view('employees.create', compact('companies', 'previousRouteName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index')
                        ->with('success','Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::get();
        return view('employees.edit',compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        
        return redirect()->route('employees.index')
                        ->with('success','Employee detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
         
        return redirect()->route('employees.index')
                        ->with('success','Employee deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('companies.index',compact('companies'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        $logoName = time().'.'.$request->logo->extension();  
        $request->logo->move(public_path('storage'), $logoName);

        $company = Company::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $logoName,
            'website' => $request->get('website')
        ]);
       
        \Mail::to('parthi.hi@gmail.com')->send(new \App\Mail\CompanyMail());

        return redirect()->route('companies.index')
                        ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company->with('employees');
        return view('companies.show',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $company->with('employees');
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        if($request->logo) {
            $logoName = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('storage'), $logoName);
        }
        
        $company->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => $logoName,
            'website' => $request->get('website')
        ]);
        
        return redirect()->route('companies.index')
                        ->with('success','Company detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
         
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function employeesDetails($id)
    {
        $company = Company::with('employees')->find($id);
        $employees = $company->employees()->latest()->paginate(10);
        
        return view('companies.employees-details', compact('company', 'employees'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }
}

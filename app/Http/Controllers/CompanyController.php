<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $companies=Company::all();
        return view('companies')->with('companies',$companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CCreate')->with('mode','create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'taxNumber' => 'required|min:11',
            'phone_number' => 'required',
            'company_email' => 'required|email',
        ]);
        $company=new Company;
        $company->company_name = $request->company_name;
        $company->taxNumber = $request->taxNumber;
        $company->phone_number = $request->phone_number;
        $company->company_email = $request->company_email;
        $company->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

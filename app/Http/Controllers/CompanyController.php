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
        return redirect('home')->with('success','Sikeres létrehozás!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('C_Show')->with('company',$company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $company=Company::findOrFail($id);
        return view('CCreate')->with('company',$company)->with('mode','edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $company=Company::findOrFail($id);
        $company->company_name = $request->company_name;
        $company->taxNumber = $request->taxNumber;
        $company->phone_number = $request->phone_number;
        $company->company_email = $request->company_email;
        $company->save();
        return redirect('home')->with('success','Sikeres módosítás!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        Company::findOrFail($id)->delete();
        return redirect('/home')->with('success','Sikeres törlés!');
    }
}

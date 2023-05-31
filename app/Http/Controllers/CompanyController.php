<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        try {
            $companies = Company::all();
            return view('companies')->with('companies', $companies);
        } catch (Exception $exp) {
            return redirect()->back()->with('error', 'Hiba történt a cégek lekérdezése során.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CCreate')->with('mode', 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'company_name' => 'required',
                'taxNumber' => 'required|min:11',
                'phone_number' => 'required',
                'company_email' => 'required|email',
            ]);

            $company = new Company;
            $company->company_name = $request->company_name;
            $company->taxNumber = $request->taxNumber;
            $company->phone_number = $request->phone_number;
            $company->company_email = $request->company_email;
            $company->save();

            return redirect('home')->with('success', 'Sikeres létrehozás!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Egyéb hiba történt, kezeljük a kivételt itt
            return redirect()->back()->with('error', 'Hiba történt a céges adatok mentése során.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $company = Company::findOrFail($id);
            return view('C_Show')->with('company', $company);
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Hiba történt a céges adatok megjelenítése során.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $company = Company::findOrFail($id);
            return view('CCreate')->with('company', $company)->with('mode', 'edit');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Hiba történt a céges adatok módosítása során.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'company_name' => 'required',
                'taxNumber' => 'required|min:11',
                'phone_number' => 'required',
                'company_email' => 'required|email',
            ]);
            $company = Company::findOrFail($id);
            $company->company_name = $request->company_name;
            $company->taxNumber = $request->taxNumber;
            $company->phone_number = $request->phone_number;
            $company->company_email = $request->company_email;
            $company->save();
            return redirect('home')->with('success', 'Sikeres módosítás!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Egyéb hiba történt, kezeljük a kivételt itt
            return redirect()->back()->with('error', 'Hiba történt a céges adatok módosítása során.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Company::findOrFail($id)->delete();
            return redirect('/home')->with('success', 'Sikeres törlés!');
        }catch(Exception $ex){
            return redirect()->back()->with('error', 'Hiba történt a cég törlése során.');
        }
        
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try{
            $companies=Company::get()->take(4);
            return view('home')->with('companies',$companies);
        } catch(Exception $exp){
            return redirect('home')->with('error', 'Hiba történt a cégek lekérdezése során.');
        }
    }

}

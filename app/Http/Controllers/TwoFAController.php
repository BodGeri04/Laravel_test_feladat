<?php

namespace App\Http\Controllers;

use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TwoFAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $code=UserCode::where('user_id', auth()->user()->id)->first();
       return view('2fa')->with('code',$code);

       //Jelenleg a fenti kód a tesztelés miatt van. Megjeleníti a blade-ben a kódot. Olvasd el a README file-t ha a rendes működését akarod látni.
       
       //eredeti kód -> return view('2fa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required',
        ]);
  
        $find = UserCode::where('user_id', auth()->user()->id)
                        ->where('code', $request->code)
                        ->where('updated_at', '>=', now()->subMinutes(2))
                        ->first();
  
        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);
            return redirect()->route('home');
        }
  
        return back()->with('error', 'Hibás kódot adtál meg!');
    }
    public function resend()
    {
        auth()->user()->generateCode();
  
        return back()->with('success', 'A kódot elküldtük újra!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

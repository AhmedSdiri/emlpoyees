<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\Country;
use App\Client;
use App\Devis;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $devis = DB::table('devis')
           
            ->leftJoin('city', 'devis.ville_de_deces', '=', 'city.name')
            ->select('devis.*')
            ->paginate(10);
         
        
        return view('devis-mgmt.index', ['devis' => $devis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		 
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        return view('devis-mgmt.create', ['cities' => $cities, 'states' => $states, 'countries' => $countries]);
        //return view('devis-mgmt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
            $keys = ['tel',
            'email',
            'situation',
            'ville_de_deces',
            'date_de_deces',
            'lieu_de_deces',
            'mode_de_sépulture',
            'destination_de_defunt',
            'ceremonie',
            'option',
            'observation'
                     
        ];
         
          $input = $this->createQueryInput($keys, $request);
          Devis::create($input);
        
          /*Client::create($request->all());
          return redirect('/client-management');*/
        return redirect()->intended('/devis-management');
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
        $devis = Devis::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($devis == null || count($devis) == 0) {
            return redirect()->intended('/devis-management');
        }
         
        $cities = City::all();
        $states = State::all();
        $countries = Country::all();
        return view('devis-mgmt.edit', ['devis' => $devis, 'cities' => $cities, 'states' => $states, 'countries' => $countries
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Devis::where('id', $id)->delete();
         return redirect()->intended('/devis-management');
    }
     private function validateInput($request) {
        $this->validate($request, [
            'tel' => 'required',
            'email' => 'required|max:120',
            'situation' => 'required',
            'ville_de_deces' => 'required',
            'date_de_deces' => 'required',
            'lieu_de_deces' => 'required',
            'mode_de_sépulture' => 'required',
            'destination_de_defunt' => 'required',
            'ceremonie' => 'required',
            'option' => 'required',
            'observation' => 'required',
           
            
               
          
        ]);
    }
      private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}

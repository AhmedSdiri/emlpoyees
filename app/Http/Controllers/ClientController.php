<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\City;
use App\State;
use App\Country;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        
         $clients = DB::table('clients')
        ->leftJoin('city', 'clients.city_id', '=', 'city.id')
       
        ->leftJoin('state', 'clients.state_id', '=', 'state.id')
        ->leftJoin('country', 'clients.country_id', '=', 'country.id')
       
     // ->select('clients.*', 'department.name as department_name', 'department.id as department_id', 'division.name as division_name', 'division.id as division_id')
        ->paginate(5);

        return view('clients-mgmt/index', ['clients' => $clients]);
        
      
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
       
        return view('clients-mgmt/create', ['cities' => $cities, 'states' => $states, 'countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validateInput($request);
        // Upload image
        $path = $request->file('picture')->store('avatars');
       
        $keys = ['lastname', 'firstname','email','tel', 'city_id', 'state_id', 'country_id'
        ];
        
        $input = $this->createQueryInput($keys, $request);
        $input['picture'] = $path;
        
        // Not implement yet
        
        Client::create($input);
        
          /*Client::create($request->all());
          return redirect('/client-management');*/
        return redirect()->intended('/client-management');
        
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
        //
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
        //
    }
    public function search(Request $request) {
         $constraints = [
            'firstname' => $request['firstname'],
            'department.name' => $request['department_name']
            ];
        $employees = $this->doSearchingQuery($constraints);
        $constraints['department_name'] = $request['department_name'];
        return view('employees-mgmt/index', ['employees' => $employees, 'searchingVals' => $constraints]);
    }
     private function validateInput($request) {
        $this->validate($request, [
            'lastname' => 'required|max:60',
            'firstname' => 'required|max:60',  
            'email' => 'required|max:120',
            'tel' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required'
               
          
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

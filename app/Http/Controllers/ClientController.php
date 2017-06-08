<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\City;
use App\State;
use App\Country;
use App\Client;
use Flashy;

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
        Flashy::success('Message', 'http://your-awesome-link.com');

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
        
        $client = Client::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($client == null || count($client) == 0) 
        {
            return redirect()->intended('/client-management');
        }
        
           $cities = City::all();
           $states = State::all();
           $countries = Country::all();
        
        return view('clients-mgmt.edit', ['client' => $client, 'cities' => $cities, 'states' => $states, 'countries' => $countries
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
        $client = Client::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['lastname',
            'firstname',  
            'email',
            'tel',
            'city_id',
            'state_id',
            'country_id'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('picture')) {
            $path = $request->file('picture')->store('avatars');
            $input['picture'] = $path;
        }

        Client::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/client-management');
        
       /* $user = User::findOrFail($id);
        $constraints = [
           'lastname' => 'required|max:60',
            'firstname' => 'required|max:60',  
            'email' => 'required|max:120',
            'tel' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required'
            ];
        $input = [
            'lastname' => $request['username'],
            'firstname' => $request['firstname'],
             'email' => $request['email'],
             'tel'=> $request['tel'],
              'city_id' => $request[ 'city_id'],
             'state_id' => $request['state_id'],
            'country_id' => $request['country_id'],
            
        ];
       if ($request['password'] != null && strlen($request['password']) > 0) {
            $constraints['password'] = 'required|min:6|confirmed';
            $input['password'] =  bcrypt($request['password']);
        }
        $this->validate($request, $constraints);
        Client::where('id', $id)
            ->update($input);
        
        return redirect()->intended('/client-management');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
         Client::where('id', $id)->delete();
         return redirect()->intended('/client-management');
    }
    public function search(Request $request) {
         $constraints = [
            'firstname' => $request['firstname'],
              'lastname' => $request['lastname'],
            'tel' => $request['tel']
            ];
        $clients = $this->doSearchingQuery($constraints);
        $constraints['department_name'] = $request['department_name'];
        return view('clients-mgmt/index', ['clients' => $clients, 'searchingVals' => $constraints]);
    }
      private function doSearchingQuery($constraints) {
        $query = DB::table('clients')
        ->leftJoin('city', 'clients.city_id', '=', 'city.id')
       
        ->leftJoin('state', 'clients.state_id', '=', 'state.id')
        ->leftJoin('country', 'clients.country_id', '=', 'country.id')
       
        ->select('clients.firstname as client_name', 'clients.*');
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
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
      public function load($name) {
         $path = storage_path().'/app/avatars/'.$name;
        if (file_exists($path)) {
            return Response::download($path);
        }
    }
   /* public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("firstname", "LIKE","%$keyword%")
                    ->orWhere("lastname", "LIKE","%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("tel", "LIKE", "%$keyword%");
                  
            });
        }
        return $query;
    }*/
}

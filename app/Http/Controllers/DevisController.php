<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;
use App\Country;
use App\Client;
use App\Devis;
use Flashy;
use ConsoleTVs\Charts\Facades\Charts;

use App\Notifications\DevisCreateNotification;
use App\Notifications\DevisDeleteNotification;
use App\Notifications\DevisUpdateNotification;

use App\User;
use App\All;
use Auth;

use Excel;
use Illuminate\Support\Facades\Input;



class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function exportExcel(Request $request) {
       
         
         $this->prepareExportingData($request)->export('xlsx');
        
    }
     private function prepareExportingData($request) 
     {
        $author = Auth::user()->username;
        $employees = $this->getExportingData(['from'=> $request['from'], 'to' => $request['to']]);
        return Excel::create('report_from_'. $request['from'].'_to_'.$request['to'], function($excel) use($employees, $request, $author) {
        
        // Set the title
        $excel->setTitle('List of hired employees from '. $request['from'].' to '. $request['to']);
                        
        // Chain the setters
        $excel->setCreator($author)
            ->setCompany('HoaDang');

        // Call them separately
        $excel->setDescription('The list of hired employees');

        $excel->sheet('Hired_Employees', function($sheet) use($employees) {

        $sheet->fromArray($employees);
            });
        });
    }
   private function getExportingData($constraints) {
       
       
       return DB::table('devis')
           
        ->leftJoin('city', 'devis.ville_de_deces', '=', 'city.name')
        ->select('devis.*')
        ->get()
        ->map(function ($item, $key) {
        return (array) $item;
        })
        ->all();
       
    }
    public function downloadExcel($type)
	{
		$data = Devis::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
    public function importExcel()
	{
        $path = Input::file('import_file')->getRealPath();
       
		if(Input::hasFile('import_file')){
			
			$data = Excel::load($path, function($reader) {
			})->get();
            
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
                    
					$insert[] = [
'id' => $value->id,
'tel' => $value->tel,
'email' => $value->email, 
'situation' => $value->situation, 
'ville_de_deces' => $value->ville_de_deces,
'date_de_deces' => $value->date_de_deces,
'lieu_de_deces' => $value->lieu_de_deces,
'mode_de_sépulture' => $value->mode_de_sépulture,
'destination_de_defunt' => $value->destination_de_defunt,
'ceremonie' => $value->ceremonie, 
'option' => $value->option, 
'observation' => $value->observation,
'etat' => $value->etat, 
'traitement' => $value->traitement, 
'start-time' => $value->$value->start-time, 
'deadline' => $value->deadline, 
'created_at' => $value->created_at,
'updated_at' => $value->updated_at
];
				}
               
				if(!empty($insert)){
					DB::table('devis')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}

    public function index()
    {
          $devis = DB::table('devis')
           
            ->leftJoin('city', 'devis.ville_de_deces', '=', 'city.name')
            ->select('devis.*')
            ->paginate(5);
         
        
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
        
        auth()->user()->notify(new DevisCreateNotification());
        
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
        $devis = Devis::findOrFail($id);
        $this->validateInput($request);
        // Upload image
        $keys = ['tel' ,
            'email',
            'situation',
            'ville_de_deces',
            'date_de_deces',
            'lieu_de_deces',
            'mode_de_sépulture',
            'destination_de_defunt',
            'ceremonie',
            'option' ,
            'observation'];
        $input = $this->createQueryInput($keys, $request);
        if ($request->file('picture')) {
            $path = $request->file('picture')->store('avatars');
            $input['picture'] = $path;
        }

        Devis::where('id', $id)
            ->update($input);
        
        Flashy::success('Devis updated successfully', '#');
        
         auth()->user()->notify(new DevisUpdateNotification());
        
         return redirect()->intended('/devis-management');
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
        
         auth()->user()->notify(new DevisDeleteNotification());
        
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
    public function search(Request $request)
    {
        $constraints = [
            
            'tel' => $request['tel'],
            'email' => $request['email']
              
            ];
        $devis = $this->doSearchingQuery($constraints);
        //$constraints['department_name'] = $request['department_name'];
        return view('devis-mgmt/index', ['devis' => $devis, 'searchingVals' => $constraints]);
    }
    private function doSearchingQuery($constraints)
     {
        $query = DB::table('devis')
       /* ->leftJoin('city', 'clients.city_id', '=', 'city.id')
       
        ->leftJoin('state', 'clients.state_id', '=', 'state.id')
        ->leftJoin('country', 'clients.country_id', '=', 'country.id')
       */
        ->select( 'devis.*');
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
    
    public function chart()
    {
        // $lava = new \Khill\Lavacharts\Lavacharts;
        //$chart = new ConsoleTVs\Charts\Facades\Charts;
 
         $devis = DB::table('devis')
           
            ->leftJoin('city', 'devis.ville_de_deces', '=', 'city.name')
            ->select('devis.*');
      //  dd($devis);

    $chart = Charts::database(Devis::all(), 'bar', 'highcharts')
    ->ElementLabel("Total")
    ->Dimensions(500, 500)
    ->Responsive(false)
   ->groupBy('ceremonie');
        
     $chart1 = Charts::database(Devis::all(),'bar', 'highcharts')
     ->Title('pie')
     ->Labels(['First', 'Second', 'Third'])
     ->Values([5,10,20])
     ->Dimensions(1000,500)
     ->Responsive(false)
     ->groupBy('option');
         $chart6 = Charts::database(Devis::all(),'bar', 'highcharts')
     ->Title('pie')
     ->Labels(['First', 'Second', 'Third'])
     ->Values([5,10,20])
     ->Dimensions(1000,500)
     ->Responsive(false)
     ->groupBy('destination_de_defunt');
         $chart5 = Charts::database(Devis::all(),'bar', 'highcharts')
     ->Title('pie')
     ->Labels(['First', 'Second', 'Third'])
     ->Values([5,10,20])
     ->Dimensions(1000,500)
     ->Responsive(false)
     ->groupBy('option');
        
     $chart2 = Charts::database(Devis::all(),'pie', 'highcharts')
     ->Title('pie')
     ->Labels(['First', 'Second', 'Third'])
     ->Values([5,10,20])
     ->Dimensions(1000,500)
     ->Responsive(false)
     ->groupBy('situation');
        
        //REALTIME
        $chart7 = Charts::realtime(url('data'),1000,'gauge','canvas-gauges')
            ->Responsive(false)
            ->Width(0);
        
      $chart8 = Charts::realtime(url('data'),1000,'line','highcharts')
             ->Responsive(false)
             ->Dimensions(1000,500)
            ->Width(0);
      
        
     $chart3 = Charts::database(Devis::all(),'line', 'highcharts')
    ->Title('line')
    ->ElementLabel('My nice label')
     ->Labels(['First', 'Second', 'Third'])
     ->Values([5,10,20])
     ->Dimensions(1000,500)
     ->Responsive(false)
     ->groupBy('lieu_de_deces');
        
      $chart4 = Charts::create('geo', 'highcharts')
    ->Title('geo')
    ->ElementLabel('My nice label')
    ->Labels(['ES', 'FR', 'RU'])
    ->Colors(['#C5CAE9', '#283593'])
    ->Values([5,10,20])
    ->Dimensions(1000,500)
    ->Responsive(false);
        
    return view('charts.consoletvs', ['chart'=>$chart,'chart1'=>$chart1,'chart2'=>$chart2,'chart3'=>$chart3,'chart4'=>$chart4,'chart5'=>$chart5,'chart6'=>$chart6,'chart7'=>$chart7,'chart8'=>$chart8]);
    
    }
   
}

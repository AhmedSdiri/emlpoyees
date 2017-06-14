<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Devis;
use Auth;
use Excel;
use Illuminate\Support\Facades\Input;


class ReportDevisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        date_default_timezone_set('asia/ho_chi_minh');
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format, strtotime("+30 days"));
        $constraints = [
            'from' => $now,
            'to' => $to
        ];

        
        $devis = DB::table('devis')
           
            ->leftJoin('city', 'devis.ville_de_deces', '=', 'city.name')
            ->select('devis.*')
            ->paginate(5);
        return view('reports-mgmt.index', ['devis' => $devis, 'dateVals' => $constraints]);
    }
     public function exportExcel(Request $request) 
     {
       
       $this->prepareExportingData($request)->export('xlsx');
         
     }
     private function prepareExportingData($request) 
     {
        $author = Auth::user()->username;
        $devis = $this->getExportingData(['from'=> $request['from'], 'to' => $request['to']]);
        return Excel::create('report_from_'. $request['from'].'_to_'.$request['to'], function($excel) use($devis, $request, $author) {
        
        // Set the title
        $excel->setTitle('List of  '. $request['from'].' to '. $request['to']);
                        
        // Chain the setters
        $excel->setCreator($author)
            ->setCompany('HoaDang');

        // Call them separately
        $excel->setDescription('The list Devis');

        $excel->sheet('Devis', function($sheet) use($devis) {

        $sheet->fromArray($devis);
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
    public function search(Request $request) {
        $constraints = [
            'from' => $request['from'],
            'to' => $request['to']
        ];

        $devis = $this->getHiredEmployees($constraints);
        return view('reports-mgmt/index', ['devis' => $devis, 'dateVals' => $constraints]);
    }
     private function getHiredEmployees($constraints) {
        $devis = Devis::where('date_de_deces', '>=', $constraints['from'])
                        ->where('date_de_deces', '<=', $constraints['to'])
                        ->get();
        return $devis;
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
    //import
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
 'mode_de_sepulture' => $value->mode_de_sepulture,
 'destination_de_defunt' => $value->destination_de_defunt,
 'ceremonie' => $value->ceremonie, 
 'option' => $value->option, 
 'observation' => $value->observation,
 'etat' => $value->etat, 
 'traitement' => $value->traitement, 
 'starttime' => $value->starttime, 
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}

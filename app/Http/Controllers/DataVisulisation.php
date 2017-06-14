<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Devis;
use DB;
use App\City;
use App\State;
use App\Country;
use App\Client;
use Flashy;
use ConsoleTVs\Charts\Facades\Charts;


class DataVisulisation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $lava = new \Khill\Lavacharts\Lavacharts;
        //$chart = new ConsoleTVs\Charts\Facades\Charts;
 
         $devis = DB::table('devis')
           
            ->leftJoin('city', 'devis.ville_de_deces', '=', 'city.name')
            ->select('devis.*');
        
      //  dd($devis);
        
       /* $countries = DB::table('city')
                   ->select('city.name');
        dd($countries);*/

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
        
    return view('charts-mgmt.consoletvs', ['chart'=>$chart,'chart1'=>$chart1,'chart2'=>$chart2,'chart3'=>$chart3,'chart4'=>$chart4,'chart5'=>$chart5,'chart6'=>$chart6,'chart7'=>$chart7,'chart8'=>$chart8]);
    
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

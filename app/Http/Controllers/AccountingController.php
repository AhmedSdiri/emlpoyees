<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Accounting;
use App\Devis;
use Illuminate\Support\Facades\DB;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function label(Request $request,$id)
    {
         
        
         
        
        $devi = Devis::findOrFail($id);
        $id_devi = $id;
        Accounting::create([
             
            'service' => $request['service'],
            'price' => $request['price'],
            'account_id'=>$id_devi
            
        ]);
        
       
       $devi = Devis::findOrFail($id);
        $id = $devi->id;
         if($devi)
         {
          $devi->traitement = 1;  
          $devi->save();
         }
         $id_devi = $id;
          $accountings= Accounting::all();
        
       
        $var = DB::table('accountings')
               ->select('price')
               ->where('account_id', '=', $id)
               ->get();
        
     
        $taille = count($var);
        $s =0;
        for($i=0;$i<$taille;$i++)
        {
           //dd($var[$i]->price);
             $s += $var[$i]->price;
             $i++;
        }
        
        return view('/devis-mgmt.show', compact('devi','id','accountings','var','s'));
    }
    public function index()
    {
        //
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
        
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
      // redirect('/devis-mgmt.show',);
    }
     
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         
       $devi = Devis::findOrFail($id);
       
        $id = $devi->id;
          if($devi)
          {
              
           $devi->traitement = 1;  
           $devi->save();
              
          }
          $id_devi = $id;
          $accountings= Accounting::all();
        
       
        $var = DB::table('accountings')
               ->select('price')
               ->where('account_id', '=', $id)
               ->get();
        
     
        $taille = count($var);
        $s =0;
        for($i=0;$i<$taille;$i++)
        {
           //dd($var[$i]->price);
             $s += $var[$i]->price;
             $i++;
        }
        
     
         return view('accountings-mgmt.edit',compact('devi','id','accountings','var','s'));
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
       dd('success');
        
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
    private function validateInput($request) {
       
        $this->validate($request, [
        'service' => 'required|max:60',
        'price' => 'required|max:60'
       
    ]);
    }
}

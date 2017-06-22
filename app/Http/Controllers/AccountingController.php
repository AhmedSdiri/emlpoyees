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
        /*$accountings = DB::table('accountings')
            ->where('id', '=',$id_devi)       
            ->get();*/
       
         /*$accountings = DB::table('accountings')
                    ->select('*');*/
         $accountings= Accounting::all();
       // $results = DB::select( DB::raw("SELECT some('price') FROM accountings WHERE account_id = '$id_devi'") );
      // $total = DB::table('accountings')->where('account_id', $id_devi)->value('price');
        
     /* $total = DB::table('accountings')
            ->where('account_id',$id_devi)       
            ->get();*/
        
        // $total = DB::table('users')->where('name', 'John')->value('email');
        
        //return view('/devis-mgmt.show', ['devi'=>$devi,'accountings'=>$accountings,'total'=>$total]);
        
        return view('/devis-mgmt.show', compact('devi','accountings'));
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
    private function validateInput($request) {
        $this->validate($request, [
        'service' => 'required|max:60',
        'price' => 'required|max:60'
       
    ]);
    }
}

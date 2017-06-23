<?php

namespace App\Mail;
use App\Devis;
use App\Accounting;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class Mymail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public function __construct($devi)
    {
     
        $this->mydevi = $devi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
          //dd($this->mydevi);   
          // $this->mydevi = $aux;
        $var = DB::table('accountings')
               ->select('price')
               ->where('account_id', '=',$this->mydevi->account_id)
               ->get();
        
     
        $taille = count($var);
        $s =0;
        for($i=0;$i<$taille;$i++)
        {
             $s += $var[$i]->price;
             $i++;
        }
        
           $accountings= Accounting::all();
           return $this->from('monsite@chezmoi.com')
                    ->view('emails-mgmt.email',['devi'=>$this->mydevi,'accountings'=>$accountings,'s'=>$s,'taille'=>$taille]);
    }
}

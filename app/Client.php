<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    
    /*  protected $fillable = [
        'nom','prenom', 'email','tel', 'city_id','state_id','country_id','picture'
    ];
    */
       protected $guarded = [];
    
}

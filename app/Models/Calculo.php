<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Calculo extends Model
{
    protected $table = 'calculos';

    protected $fillable = [
        'jornada_id', 'inicio', 'final', 'estado'
         
    ];
    

    public function jornada()
    {
        return $this->belongsTo('App\Models\Jornada');
    }

    
    public function detalles()
    {
        return $this->belongsToMany('App\Models\DetalleCalculo');
    }

    

    
   

    
 
    

    
}

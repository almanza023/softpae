<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleCalculo extends Model
{
    protected $table = 'detalle_calculos';

    protected $fillable = [
        'calculo_id', 'menu_id', 'dia', 'estado'
         
    ];   

    

    public function calculos()
    {
        return $this->belongsToMany('App\Models\Calculo');
    }

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu');
    }

    public static function getAllId($jornada, $inicio, $final){
        $resul = DB::table('detalle_calculos as dc') 
        ->join('calculos as c', 'c.id', '=', 'dc.calculo_id')   
        ->join('menus as m', 'm.id', '=', 'dc.menu_id')           
        ->join('codigo_menus as cm', 'm.id', '=', 'cm.menu_id')
        ->select( "c.id as calculo_id", "dc.dia", "dc.menu_id as menu_id", 'cm.codigo')
        ->where('c.jornada_id', $jornada)      
        ->where('c.inicio', $inicio)      
        ->where('c.final', $final)      
        ->orderBy('dc.dia', 'asc')
        ->get();
        return $resul;
    }


    
  
    
 
    

    
}
